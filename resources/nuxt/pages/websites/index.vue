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
        <h1>-----</h1>
        <Paginator/>
    </div>
</template>

<script>
    import Paginator from "~/components/Paginator";
    export default {
        name: "index",
        components: {Paginator},
        data () {
            return {
                allWebsites: [],
                search: ""
            }
        },
        computed: {
            websites () {
                return this.allWebsites.filter(website => website.name.toLowerCase().indexOf(this.search.toLowerCase()) > -1);
            },
        },
        async fetch () {
            this.fetchWebsites();
        },
        methods: {
           fetchWebsites: async function() {
              let page = this.$route.query.page || 0;
              var results = await this.$axios.$get('api/websites?page='+page);
              this.$store.commit('paginator/setLastPage',results['pagination']['last']);
              this.allWebsites = results['data'];
          }
        },
        watch:{
            $route (to, from){
                this.fetchWebsites();
            }
        }
    }
</script>

<style scoped>
    .pagination {
        display: inline-block;
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
    }
</style>
