   <!-- Main Page -->
   <div class="main-panel">
       <div class="content-wrapper">
           <div class="col-12 ">
               <div class="card">
                   <div class="card-body">
                       <h3>Super Administrator</h3>
                       <h6 class="card-title mt-30">Update Password</h6>
                       <form id="updatePasswordForm">

                           <div class="row">
                               <div class="col-sm-6">
                                   <div class="form-group">
                                       <label class="control-label">Old Password</label>
                                       <input name="old_password" type="text" class="form-control" placeholder="Old Password">
                                   </div>
                               </div>
                               <div class="col-sm-6">
                                   <div class="form-group">
                                       <label class="control-label">New Password</label>
                                       <input name="password" type="text" class="form-control" placeholder="Password">
                                   </div>
                               </div><!-- Col -->
                           </div><!-- Row -->
                           <div class="text-right">
                                   <div id="loading" class="loading-spinner"></div>
                                   <div id="response"></div>
                               <a id="updatePasswordBtn" class="btn btn-secondary">Update</a>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>
   </div>
   <script>
       new HTTP().bindAjax({
           btnID: 'updatePasswordBtn',
           formID: 'updatePasswordForm',
           extraParameters: '',
           controllerRoute: 'UpdatePassword',
           callbackFunction: function(response) {
               if (!response['err']) {
                   window.location.href = "<?= Generic::baseURL(); ?>/account-settings";
               }
           },
           responseID: 'response',
           loadingID: 'loading'
       });
   </script>