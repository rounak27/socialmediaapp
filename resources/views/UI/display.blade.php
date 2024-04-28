@extends('layout')
@section('content')
<div> <a href="{{ route('posts.create') }}" class="btn btn-success">Create New Post</a></div>
<div class="container">
  <div class="row">
    @foreach ($pictures as $picture)
    <div class="col-md-6 offset-md-3">
      <!-- Card -->
      <div class="card">
        <!-- Card Header - Username -->
        <div class="card-header">
            <h5 class="card-title text-center">{{ $picture->user->name }}</h5>
        </div>
        <!-- Card Body - Picture and Description -->
        <div class="card-body" style="margin: 20px;">
          <!-- Picture -->
          <img src="{{ Storage::url($picture->FilePath) }}" class="card-img-top" alt="Sample Picture">

          <!-- Description -->
          <p class="card-text mt-2">{{ $picture->Title }}</p>
        </div>
        <!-- Card Footer - Like and Dislike Buttons -->
        <div class="card-footer text-center">
          <p id="likes-count-{{ $picture->PictureID }}">Likes: {{ $picture->likes_count }}</p>
          <p id="dislikes-count-{{ $picture->PictureID }}">Dislikes: {{ $picture->dislikes_count }}</p>
          <button onclick="submitLikeDislike('{{ $picture->PictureID }}', 'like')" style="{{ $picture->isLikedByCurrentUser($picture->PictureID) ? 'background-color: green;' : '' }}">Like</button>
          <button onclick="submitLikeDislike('{{ $picture->PictureID }}', 'dislike')" style="{{ $picture->isDislikedByCurrentUser($picture->PictureID) ? 'background-color: red;' : '' }}">Dislike</button>
          <p>Liked by:
            @foreach ($picture->likedBy as $like)
                {{ $like }},
            @endforeach
        </p>
        <p>Disliked by:
            @foreach ($picture->dislikedBy as $dislike)
                {{ $dislike }},
            @endforeach
        </p>
          <p id="like-dislike-message-{{ $picture->PictureID }}"></p>

        </div>
      </div>
      <!-- End of Card -->
    </div>
    @endforeach
  </div>
</div>
<script>
  function submitLikeDislike(pictureID, action) {
    $.ajax({
      type: "POST",
      url: "/like-dislike",
      data: {
        _token: "{{ csrf_token() }}",
        picture_id: pictureID,
        like_dislike: action
      },
      success: function(response) {
        var likesCountElement = $("#likes-count-" + pictureID);
        var dislikesCountElement = $("#dislikes-count-" + pictureID);
        var messageElement = $("#like-dislike-message-" + pictureID);

        // Update counts
        likesCountElement.text("Likes: " + response.likesCount);
        dislikesCountElement.text("Dislikes: " + response.dislikesCount);

        // Show message
        messageElement.text(response.message);

        // Update button colors based on user's actions
        var likeButton = $("button[data-action='like'][data-picture-id='" + pictureID + "']");
        var dislikeButton = $("button[data-action='dislike'][data-picture-id='" + pictureID + "']");
        likeButton.css("background-color", response.isLiked ? "green" : "");
        dislikeButton.css("background-color", response.isDisliked ? "red" : "");
        location.reload();

        
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  }
</script>
@endsection
