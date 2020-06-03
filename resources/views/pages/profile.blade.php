@extends('layouts.app')

@section('css_script')
    @parent
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

<div class="modal fade" id="help_profile" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Help</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <div>
                  <h3>Can I edit my profile information?</h3>
                  <p>Yes. On the Edit tab you can change you first and last name, your email, description, username and even your password.</p>
              </div>
              <div>
                  <h3>Where can I access my questions? What about my notifications?</h3>
                  <p>It's easy. To access your questions just jump over to the My Questions tab. Regarding your notifications, you can see them on the Notifications tab on your profile page or anywhere in the website by clicking the bell icon on the upper right corner of the screen.</p>
              </div>
              <div>
                  <h3>What does my score mean?</h3>
                  <p>Your score depends directly on the likes and dislikes of all of your posts (them being questions, answers or comments). It is a weighted sum of all your post's ranks, meaning that you can have a negative or positive score.</p>
              </div>
          </div>
          <div class="modal-footer">
              <button id="close_help_question" class="btn btn-primary" data-dismiss="modal">Ok, thank you</button>
          </div>
      </div>
  </div>
</div> 

@section('content')
  @include('partials.profile')
@endsection