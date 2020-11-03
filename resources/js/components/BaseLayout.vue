<template>
  <div class="page-container">
    <md-app>
      <md-app-toolbar class="md-primary">
        <span class="md-title"><slot name="header">Personnel Skills Profiler</slot></span>
      </md-app-toolbar>

      <md-app-drawer md-permanent="full">
        <md-toolbar class="md-transparent" md-elevation="0">
          Navigation
        </md-toolbar>

        <md-list>
          <md-list-item>
            <md-icon>home</md-icon>
            <span class="md-list-item-text"><router-link to="/">Home</router-link></span>
          </md-list-item>

          <md-list-item>
            <md-icon>perm_identity</md-icon>
            <span class="md-list-item-text"><router-link to="/add">Add Personnel</router-link></span>
          </md-list-item>

          <md-list-item>
            <md-icon>delete</md-icon>
            <span class="md-list-item-text"><router-link to="/example">Form validation</router-link></span>
          </md-list-item>

          <md-list-item>
            <md-icon>error</md-icon>
            <span class="md-list-item-text">Spam</span>
          </md-list-item>
        </md-list>
      </md-app-drawer>

      <md-app-content>
        <router-view></router-view>
<!--        <div><slot></slot></div>-->
      </md-app-content>
    </md-app>
  </div>
<!--    <div class="container">-->
<!--        <nav class="navbar navbar-light bg-light">-->
<!--            <span class="navbar-brand mb-0 h1"><slot name="header">Navbar</slot></span>-->
<!--        </nav>-->
<!--        <main class="md-content">-->
<!--            <div><slot></slot></div>-->
<!--        </main>-->
<!--        <footer>-->
<!--            <slot name="footer"></slot>-->
<!--        </footer>-->
<!--    </div>-->
</template>

<script>

    export default {
        name: 'base-layout',
    }

</script>

<style lang="scss" scoped>
.md-app {
  max-height: 400px;
  border: 1px solid rgba(#000, .12);
}

// Demo purposes only
.md-drawer {
  width: 230px;
  max-width: calc(100vw - 125px);
}
</style>
