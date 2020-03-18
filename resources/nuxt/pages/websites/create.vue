    <template>
        <div class="container">
            <h1>Add website</h1>
            <div>
                <label for="website-name">Name</label>
                <input v-model="name" id="website-name" type="text">
            </div>
            <div>
                <label for="website-url">Url</label>
                <input v-model="url" id="website-url" type="text">
            </div>
            <div>
                <button @click="save">Save</button>
            </div>
            <div class="text-sm error" v-if="errors.length">
                <ul>
                    <li v-for="err in errors">
                        {{err}}
                    </li>
                </ul>
            </div>
            <div class="success" v-if="success">
                <h3>Link created!</h3>
            </div>
        </div>
    </template>

<script>
    export default {
        name: "website.create",
        data() {
            return {
                url: "",
                name: "",
                errors: [],
                success: false
            }
        },
        methods: {
            save() {
                let here = this;
                this.errors = [];
                this.$axios.$post('api/websites',{
                    url:this.url,
                    name:this.name
                }).then(
                    function(data){
                        here.url = "";
                        here.name = "";
                        here.errors = [];
                        here.success = true;
                        console.log(data);
                    }).
                    catch(function(error) {
                        console.log(error.response.data.error);
                        for (let value of Object.entries(error.response.data.error)) {
                            here.errors.push(value[1][0]);
                        }
                        // for(err of error.response.data.error){
                        //     console.log(err);
                        // }
                    // .filter( function (key, value) {
                    // });
                });
            }
        }
    }
</script>

<style scoped>

</style>
