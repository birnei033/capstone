<script>
        jQuery(document).ready(function ($) {
            $('#page-title').text('Register Your Student');
        });
    </script>
 
                        <!-- <h1 class="page-header">Lessons</h1> -->
        <div class="row">
            <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Material Form Inputs With Static Label</h5>
                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                </div>
                <div class="card-block">
                    <form class="form-material">
                        <div class="form-group form-default form-static-label">
                            <input type="text" name="footer-email" class="form-control" placeholder="Enter User Name" required="this is char">
                            <span class="form-bar"></span>
                            <label class="float-label">Username</label>
                        </div>
                        <div class="form-group form-default form-static-label">
                            <input type="text" name="footer-email" class="form-control" placeholder="Enter Email" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Email (exa@gmail.com)</label>
                        </div>
                        <div class="form-group form-default form-static-label">
                            <input type="password" name="footer-email" class="form-control" placeholder="Enter Password" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Password</label>
                        </div>
                        <div class="form-group form-default form-static-label">
                            <input type="text" name="footer-email" class="form-control" required="" placeholder="Pre define value" value="My value">
                            <span class="form-bar"></span>
                            <label class="float-label">Predefine value</label>
                        </div>
                        <div class="form-group form-default form-static-label">
                            <input type="text" name="footer-email" class="form-control" required="" placeholder="disabled Input" disabled="">
                            <span class="form-bar"></span>
                            <label class="float-label">Disabled</label>
                        </div>
                        <div class="form-group form-default form-static-label">
                            <input type="text" name="footer-email" class="form-control" required="" maxlength="6" placeholder="Enter only 6 char">
                            <span class="form-bar"></span>
                            <label class="float-label">Max length 6 char</label>
                        </div>
                        <div class="form-group form-default form-static-label">
                            <textarea class="form-control" required="">Enter Text hear</textarea>
                            <span class="form-bar"></span>
                            <label class="float-label">Text area Input</label>
                        </div>
                        <button type="submit" id="" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>
