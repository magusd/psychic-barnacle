<template>
    <div class="container">
        <article>
            <h1 class="title">Your websites</h1>
        </article>
        <p v-if="$fetchState.pending">Fetching websites...</p>
        <p v-else-if="$fetchState.error">Error while fetching posts: {{ $fetchState.error.message }}</p>
        <aside v-else>
            <input v-model="search" type="text" value="" placeholder="filter..">
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
                allWebsites: [],
                search: ""
            }
        },
        computed: {
            websites () {
                return this.allWebsites.filter(website => website.name.toLowerCase().indexOf(this.search.toLowerCase()) > -1);
                return this.allWebsites;
                // return this.$store.state.websites.all;//.filter(post => post.id !== this.id)
            },
        },
        async fetch () {

            this.allWebsites = await this.$http.$get('api/websites');
        }
    }
</script>

<style scoped>

</style>
