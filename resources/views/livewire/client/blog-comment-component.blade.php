<div>
    <div class="entry-comments mt-30">
        <h5 class="entry-comments__title uppercase mb-30">{{$blogComments->count() ?? 0}} bình luận</h5>

        <ul class="comment-list">
            @foreach($blogComments as $blogComment)
            <li class="comment">
                <div class="comment-body">
                    <div class="comment-avatar">
                        <img alt="" src="{{asset(Storage::url('users/'.$blogComment->user->avatar))}}"
                            style="width:100px;height:100px;object-fit:cover">
                    </div>
                    <div class="comment-text">
                        <h6 class="comment-author">{{$blogComment->user->name}}</h6>
                        <div class="comment-metadata">
                            <a href="#" class="comment-date">{{$blogComment->created_at->diffForHumans()}}</a>
                        </div>
                        <p>{{$blogComment->messages}}</p>
                        <a href="#" class="comment-reply">Trả lời</a>
                        @if(Auth::check() && Auth::id() == $blogComment->user_id)
                        <a class="comment-reply" style="color:red; cursor: pointer;"
                            wire:click='deleteComment({{$blogComment->id}})'>Xóa
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

    @if(Auth::check())
    <!-- Comment Form -->
    <div id="respond" class="comment-respond">
        <h5 class="comment-respond__title uppercase">Đăng tải bình luận</h5>
        <form id="form" class="comment-form" method="post" action="#">
            <div class="comment-form-comment form-group">
                <label for="comment">Nội dung bình luận</label>
                <textarea id="comment" name="comment" rows="5" class="form-control"
                    placeholder="Nhập bình luận của bạn tại đây" wire:model.defer='message'></textarea>
                @error('message')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="comment-form-submit form-group mt-3">
                <button class="btn btn-lg btn-color w-25" id="submit-message" wire:click.prevent='storeComment'
                    style="line-height: 45px; border-radius: 5px;">Gửi bình luận</button>
            </div>

            {{-- <div class="comment-form-submit bg-black">
                <button type="submit" class="btn btn-lg btn-color btn-button text-danger" id="submit-message">Post
                    Comment</button>
            </div> --}}

        </form>
    </div> <!-- end comment form -->
    @else
    <a href="{{route('login')}}" style="margin-top: 24px;color: #ec2424;display: inline-block;">
        Đăng nhập</a>
    <span> để tham gia bình luận</span>
    @endif
</div>