<div>
    <div class="entry-comments mt-30">
        <h5 class="entry-comments__title uppercase mb-30">{{$productComments->count() ?? 0}} bình luận</h5>

        <ul class="comment-list">
            @foreach($productComments as $productComment)
            <li class="comment">
                <div class="comment-body">
                    <div class="comment-avatar">
                        @if($productComment->user)
                        <img alt="" src="{{asset(Storage::url('users/'.$productComment->user->avatar))}}"
                            style="width:100px;height:100px;object-fit:cover">
                        @else
                        <img alt="" src="{{asset(Storage::url('users/avatar.png'))}}">
                        @endif
                    </div>
                    <div class="comment-text">
                        <h6 class="comment-author">{{$productComment->name}}</h6>
                        <div class="comment-metadata">
                            <a href="#" class="comment-date">{{$productComment->created_at}}</a>
                        </div>
                        <p>{{$productComment->messages}}</p>
                        <a href="#" class="comment-reply">Reply</a>
                        @if(Auth::check() && Auth::id() == $productComment->user_id)
                        <a class="comment-reply" style="color:red; cursor: pointer;"
                            wire:click='deleteComment({{$productComment->id}})'>Delete
                        </a>
                        @endif
                    </div>
                </div>
                {{-- @if(false)
                <ul class="children">
                    <li class="comment">
                        <div class="comment-body">
                            <div class="comment-avatar">
                                <img alt="" src="img/blog/comment_2.jpg">
                            </div>
                            <div class="comment-text">
                                <h6 class="comment-author">Alexander Samokhin</h6>
                                <div class="comment-metadata">
                                    <a href="#" class="comment-date">July 17, 2017 at 12:48 pm</a>
                                </div>
                                <p>This template is so awesome. I didn’t expect so many features inside. E-commerce
                                    pages are very
                                    useful, you can launch your online store in few seconds. I will rate 5 stars.</p>
                                <a href="#" class="comment-reply">Reply</a>
                            </div>
                        </div>
                    </li> <!-- end reply comment -->
                </ul>
                @endif --}}
            </li> <!-- end 1-2 comment -->
            @endforeach
        </ul>
    </div> <!-- end comments -->


    <!-- Comment Form -->
    <div id="respond" class="comment-respond">
        <h5 class="comment-respond__title uppercase">post a comment</h5>
        <form id="form" class="comment-form" method="post" action="#">
            <div class="comment-form-comment mb-3">
                <label for="comment">Comment</label>
                <textarea id="comment" name="comment" rows="5" placeholder="Nhập bình luận của bạn tại đây"
                    wire:model='comment.message'></textarea>
                @error('comment.message')
                <small style="color:red;">{{$message}}</small>
                @enderror
            </div>
            @guest
            <div class="row">
                <div class="col-lg-6">
                    <label for="name">Name</label>
                    <input name="name" id="name" type="text" wire:model='comment.name'>
                    @error('comment.name')
                    <small style="color:red;">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-lg-6">
                    <label for="email">Email</label>
                    <input name="email" id="email" type="email" wire:model='comment.email'>
                    @error('comment.email')
                    <small style="color:red;">{{$message}}</small>
                    @enderror
                </div>
            </div>
            @endguest
            <div class="comment-form-submit form-group mt-3">
                <button class="btn btn-lg btn-color w-100" id="submit-message" wire:click.prevent='storeComment'
                    style="line-height: 45px; border-radius: 5px;">Gửi bình luận</button>
            </div>

            {{-- <div class="comment-form-submit bg-black">
                <button type="submit" class="btn btn-lg btn-color btn-button text-danger" id="submit-message">Post
                    Comment</button>
            </div> --}}

        </form>
    </div> <!-- end comment form -->
</div>