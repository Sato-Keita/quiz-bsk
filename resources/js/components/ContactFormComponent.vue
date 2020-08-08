<template>
    <div class="component">
        <div class="contact-form">
            <h2 class="text-center">Contact</h2>
            <form>
                <div class="form-group">
                    <label for="exampleInputPassword1">名前</label>
                    <input type="text" class="form-control" id="exampleInputPassword1">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
              
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
        
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {}
</script>