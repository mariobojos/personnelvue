<template>
    <div class="container">
        <nav class="navbar navbar-light bg-light">
            <span class="navbar-brand mb-0 h1"><slot name="header">Navbar</slot></span>
        </nav>
        <main class="md-content">
            <div><slot></slot></div>
        </main>
        <footer>
            <slot name="footer"></slot>
        </footer>
    </div>
</template>

<script>

    export default {
        name: 'base-layout',
    }

</script>


