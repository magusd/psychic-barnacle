<template>
  <section class="container">
    <div>
      <h1 class="title">
        Vitor Lobao
      </h1>
      <h2 class="subtitle">
        tip of the day: hire him!
      </h2>
    </div>
  </section>
</template>

<script>
export default {
  head () {
    return {
        title: 'Ycode challenge'
    }
  }
}
</script>

<style scoped>
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}
.title {
  font-family: 'Quicksand', 'Source Sans Pro', -apple-system, BlinkMacSystemFont,
  'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
  display: block;
  font-weight: 300;
  font-size: 100px;
  letter-spacing: 1px;
}
.subtitle {
  font-weight: 300;
  font-size: 42px;
  color: #526488;
  word-spacing: 5px;
}
.links {
  padding-top: 15px;
}
</style>
