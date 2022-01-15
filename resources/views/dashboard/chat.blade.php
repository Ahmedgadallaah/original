
@extends('dashboard.layouts.app')
@section('content')
    <div class="content-all">

        @include('dashboard.includes.side-menu')
        <div class="content-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                        <div class="col-md-8"  style="padding: 0;">
                          <div class="row">
                            <div class="col-md-4" style="padding: 0;">
                              <div class="account-details-column" style="padding: 20px 10px;">
                                <h6 style="padding: 0;">كل الرسائل</h6>
                                <style>
                                    ::placeholder{
                                        font-size: 11px;
                                    }
                                    input{
                                        border-radius: 7px !important;
                                    }
                                    input:focus, input:hover{
                                        box-shadow: none !important;
                                    }
                                </style>
                                <div class="chat-message-search">
                                    <form class="d-flex">
                                        <input class="form-control me-2" type="search" placeholder="كتب النص هنا" aria-label="Search">
                                        <i class="fas fa-search"></i>
                                      </form>
                                </div>
                                <div class="colum-chats">
                                    <div class="chat-personly chat-personly-active">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="chat-avatar-ic">
                                                    <img src="images/chat-avatar.png">
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="chat-buyer-info">
                                                    <span>أسم التاجر</span>
                                                    <p>متةاجد الان يمكنك التحدث بحرية </p>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="chat-personly">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="chat-avatar-ic">
                                                    <img src="images/chat-avatar.png">
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="chat-buyer-info">
                                                    <span>أسم التاجر</span>
                                                    <p>متةاجد الان يمكنك التحدث بحرية </p>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="chat-personly">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="chat-avatar-ic">
                                                    <img src="images/chat-avatar.png">
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="chat-buyer-info">
                                                    <span>أسم التاجر</span>
                                                    <p>متةاجد الان يمكنك التحدث بحرية </p>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="chat-personly">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="chat-avatar-ic">
                                                    <img src="images/chat-avatar.png">
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="chat-buyer-info">
                                                    <span>أسم التاجر</span>
                                                    <p>متةاجد الان يمكنك التحدث بحرية </p>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="chat-personly">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="chat-avatar-ic">
                                                    <img src="images/chat-avatar.png">
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="chat-buyer-info">
                                                    <span>أسم التاجر</span>
                                                    <p>متةاجد الان يمكنك التحدث بحرية </p>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="chat-personly">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="chat-avatar-ic">
                                                    <img src="images/chat-avatar.png">
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="chat-buyer-info">
                                                    <span>أسم التاجر</span>
                                                    <p>متةاجد الان يمكنك التحدث بحرية </p>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="chat-personly">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="chat-avatar-ic">
                                                    <img src="images/chat-avatar.png">
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="chat-buyer-info">
                                                    <span>أسم التاجر</span>
                                                    <p>متةاجد الان يمكنك التحدث بحرية </p>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="chat-personly">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="chat-avatar-ic">
                                                    <img src="images/chat-avatar.png">
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="chat-buyer-info">
                                                    <span>أسم التاجر</span>
                                                    <p>متةاجد الان يمكنك التحدث بحرية </p>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-8">
                            </div>
                          </div>
                        </div>

                            <div class="col-md-4" style="padding: 0;">
                                <div class="right-side">
                                    <div class="chat-side">
                                        <div class="profil-img-part">
                                            <img src="images/profil-chat.png" alt=""> <br>
                                            <span>أسم التاجر</span>
                                            <p> مصر , القاهرة  , التوفيقية</p>
                                            <img src="images/star.png" alt="">
                                            <img src="images/star.png" alt="">
                                            <img src="images/star.png" alt="">
                                            <img src="images/star.png" alt="">
                                            <img src="images/star.png" alt="">
                                            <small>4.5</small>
                                        </div>

                                        <div class="files-chat">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6>الملفات</h6>
                                                </div>
                                                <div class="col-md-6">
                                                    <div style="text-align: left;">
                                                        <a href="">مشاهدة الكل</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="files-grid">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div>
                                                            <img src="images/file.png" style="width: 50px;">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div  class="file-desc-tit">
                                                            <span>أسم الملف</span>
                                                            <p>الجمعة , 20فبراير  ,2020 </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="files-grid">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div>
                                                            <img src="images/file.png" style="width: 50px;">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div  class="file-desc-tit">
                                                            <span>أسم الملف</span>
                                                            <p>الجمعة , 20فبراير  ,2020 </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="files-grid">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div>
                                                            <img src="images/file.png" style="width: 50px;">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div  class="file-desc-tit">
                                                            <span>أسم الملف</span>
                                                            <p>الجمعة , 20فبراير  ,2020 </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="files-grid">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div>
                                                            <img src="images/file.png" style="width: 50px;">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="file-desc-tit">
                                                            <span>أسم الملف</span>
                                                            <p>الجمعة , 20فبراير  ,2020 </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="links-chat">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6>الروابط</h6>
                                                </div>
                                                <div class="col-md-6">
                                                    <div style="text-align: left;">
                                                        <a href="">مشاهدة الكل</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="files-grid">
                                                <div class="file-desc-tit">
                                                    <span>موقع أورجينال</span>
                                                    <p>الجمعة , 20 فبراير  ,2020 </p>
                                                </div>
                                                <div class="file-desc-tit">
                                                    <span>موقع أورجينال</span>
                                                    <p>الجمعة , 20 فبراير  ,2020 </p>
                                                </div>
                                                <div class="file-desc-tit">
                                                    <span>موقع أورجينال</span>
                                                    <p>الجمعة , 20 فبراير  ,2020 </p>
                                                </div>
                                                <div class="file-desc-tit">
                                                    <span>موقع أورجينال</span>
                                                    <p>الجمعة , 20 فبراير  ,2020 </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    @endsection
@push('scripts')
    <script>
  // Retrieve Firebase Messaging object.
        const messaging = firebase.messaging();
        // Add the public key generated from the console here.
        messaging.usePublicVapidKey("AIzaSyDk1vIQhFxTc5WuOT6ojmWekkpNA8iulEM");

        function sendTokenToServer(fcm_token) {
            const user_id = '{{auth()->user()->id}}';
            //console.log($user_id);
            axios.post('/api/v1/save-token', {
                fcm_token, user_id
            })
                .then(res => {
                    console.log(res);
                })

        }

        function retreiveToken(){
            messaging.getToken().then((currentToken) => {
                if (currentToken) {
                    sendTokenToServer(currentToken);
                    // updateUIForPushEnabled(currentToken);
                } else {
                    // Show permission request.
                    //console.log('No Instance ID token available. Request permission to generate one.');
                    // Show permission UI.
                    //updateUIForPushPermissionRequired();
                    //etTokenSentToServer(false);
                    alert('You should allow notification!');
                }
            }).catch((err) => {
                console.log(err.message);
                // showToken('Error retrieving Instance ID token. ', err);
                // setTokenSentToServer(false);
            });
        }
        retreiveToken();
        messaging.onTokenRefresh(()=>{
            retreiveToken();


        });

        messaging.onMessage((payload)=>{
            console.log('Message received');
            console.log(payload);

            location.reload();
        });
    </script>
@endpush


