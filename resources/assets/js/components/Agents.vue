<script>
    export default {
        props: ['selectedAgent'],
        data: function() {
            return {
                name: '',
                agents : null,
            }
        },
        methods: {
            getAgents: function(){
                axios.get('/api/agents', {
                    params: {
                        name: this.name,
                    }
                })
                    .then(({data}) => {
                        this.agents = data
                        })

            },
            compareID: function(val) {
                return this.selectedAgent == val
            }
        },
        created: function () {
            this.getAgents()
        }
    }
</script>
