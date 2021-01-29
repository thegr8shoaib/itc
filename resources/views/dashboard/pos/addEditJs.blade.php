<script type="text/javascript">
    var app = new Vue({
        el: '#app',

        data: {
            products: {!! $products->toJson() !!},
            salemans: {!! $salemans->toJson() !!},
            selectedProduct: 0,
            selectedProducts: [],
        },

        methods: {


            addProduct: function () {
              var index = this.selectedProducts.findIndex(x => x.id === this.selectedProduct);
              if (index === -1) {
                this.addProduct(this.selectedProduct, index);
              }
              console.log(index);
            },
            addProduct: function(selectedProduct, index){
              selectedProduct.cartQuantity = 1;
              this.selectedProducts[index] = selectedProduct;
            },

            updateDefaultPaymentMethod: function(result) {
                var self = this;
                self.isUpdatingDefaultPaymentMethod = true;

                var paymentIntent = result.paymentIntent;
                var apiEndPoint = "{{ route('home') }}";

                var formData = new FormData();
                formData.append('paymentIntent', paymentIntent.id);
                formData.append('paymentMethod', paymentIntent.payment_method);
                formData.append('clientSecret', paymentIntent.client_secret);

                axios.post(apiEndPoint, formData).then(response => {
                    self.isUpdatingDefaultPaymentMethod = false;
                }).catch(function(e, f) {

                    alert('error');
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
