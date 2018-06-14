<script>
    export default {
        props: ['selectedProduct'],
        data: function() {
            return {
                name: '',
                products : null,
            }
        },
        methods: {
            getProducts: function(){
                axios.get('/api/products', {
                    params: {
                        name: this.name,
                    }
                })
                    .then(({data}) => {
                        this.products = data
                    })

            },
            compareID: function(val) {
                return this.selectedProduct == val
            }
        },
        created: function () {
            this.getProducts()
        }
    }
</script>
