<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>

        <p v-text="title"></p>
        <input type="text" v-model="title" />

        <!-- <md-field>
            <label>Initial Value</label>
            <md-input v-model="initial"></md-input>
        </md-field> -->


    </div>
</template>

<script>
    export default {
        name: 'example-component',

        data: function() {
            return {
                title: 'Hello',
                initial: 'Max Surban',
            }
        },

        mounted() {
            console.log('Component mounted.')
            console.log(this.title)
        }
    }
</script>
