<script type="text/javascript">
Vue.directive('selecttwo', {
  twoWay: true,
  bind: function () {
    $(this.el).select2()
    .on("select2:select", function(e) {
      this.set($(this.el).val());
    }.bind(this));
  },
  update: function(nv, ov) {
    $(this.el).trigger("change");
  }
});

    var app = new Vue({
        el: '#app',

        data: {
            products: {!! $products->toJson() !!},
            salemans: {!! $salemans->toJson() !!},
            selectedProduct: 0,
            selectedProducts: [],
        },
        created() {
           window.addEventListener('keydown', (e) => {
             // if (e.key == 'Escape') {
             //   this.showModal = !this.showModal;
             // }
             // (event.ctrlKey || event.metaKey)
             console.log(e.altKey , e.metaKey, e.key);
             console.log(e.altKey && e.key.keyCode);
             console.log(e.key.keyCode);
              if (e.altKey && e.keyCode == 83) {
                this.$refs.saleman.focus();
              }

              if (e.altKey && e.keyCode == 65) {
                this.$refs.product.focus();
              }
              if (e.altKey && e.keyCode == 68) {
                this.$refs.date.focus();
              }

           });
         },
        methods: {


            productChoosed: function () {
              var index = this.selectedProducts.findIndex(x => x.id === this.selectedProduct.id);
              if (index === -1) {
                this.addProduct(this.selectedProduct, index);
              }else {
                this.editProduct(this.selectedProduct, index);
              }
              this.selectedProduct = 0;
              $("#product").select2().val(0).change();
            },
            addProduct: function(selectedProduct, index){
              selectedProduct.cartQuantity = 1;
              this.selectedProducts.push(selectedProduct);
            },
            editProduct: function (selectedProduct, index, value = null) {
              if (value) {
                selectedProduct.cartQuantity = value;
              }else {
                selectedProduct.cartQuantity = 1 + this.selectedProducts[index].cartQuantity;
              }
              this.selectedProducts[index] = selectedProduct;
              this.selectedProducts.splice(0,0);
            },
            quantityUpdated: function (p,index,event) {
              this.editProduct(p,index, Number(event.target.value));
            },
            submitCart: function(result) {
                var self = this;
                if (this.$refs.saleman.value == '') {
                  alert('Please select saleman');
                  return 0;
                }

                if (this.$refs.date.value == '') {
                  alert('Please select date');
                  return 0;
                }
                if (this.selectedProducts.length == 0) {
                  alert('Please select a product');
                  return 0;
                }

                var apiEndPoint = "{{ route('saveInvoiceAndPrint') }}";
                var formData = new FormData();
                formData.append('selectedProducts', JSON.stringify(this.selectedProducts));
                formData.append('saleman', this.$refs.saleman.value);
                formData.append('date', this.$refs.date.value);

                axios.post(apiEndPoint, formData).then(response => {

                }).catch(function(e, f) {

                    // alert('error');
                    // console.log(e,f);
                });



            },
        },

        computed: {
            buttonAttrTitle: function() {

            }

        }

    });
</script>
