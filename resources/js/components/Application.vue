<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Application Component</div>

                    <div class="card-body">
                        <section>Step 1</section>
                        <section>Step 2</section>
                        <section>Step 3</section>
                        <section>Step 4</section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>