    <template>

    </template>

<script>
    export default {
        name: "create",
        computed: {
            websites () {
                return this.$store.state.websites.all.find()
            },
            // relatedPosts () {
            //     return this.$store.state.posts.all.filter(post => post.id !== this.id)
            // }
        }
    }
</script>

<style scoped>

</style>
