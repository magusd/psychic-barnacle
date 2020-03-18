<template>
    <div class="container">
        <article>
            <h1 class="title">Your websites</h1>
        </article>
        <p v-if="$fetchState.pending">Fetching websites...</p>
        <p v-else-if="$fetchState.error">Error while fetching posts: {{ $fetchState.error.message }}</p>
        <aside v-else>
            <ul>
                <li v-for="website in websites" :key="website.id">
                    <a :href="website.url">{{website.name}}</a>
                </li>
            </ul>
        </aside>
    </div>
</template>

<script>
    export default {
        name: "index",
        data () {
            return {
                websites: []
            }
        },
        computed: {
            // websites () {
            //     return this.websites
            // },
            // relatedPosts () {
            //     return this.$store.state.posts.all.filter(post => post.id !== this.id)
            // }
        },
        async fetch () {

            this.websites = await this.$http.$get('api/websites');
            console.log(this.websites)
        }
    }
</script>

<style scoped>

</style>
