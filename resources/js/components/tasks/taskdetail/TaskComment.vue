<template>
  <div class="section task-comments">
    <div class="top">
      Bình luận (
      <span
        class="comment-count comment-counter-24193800000"
        id="comment-counter-24193800000"
      >1</span>)
    </div>
    <div id="js-task-comments" class="__comment_canvas theme-gray">
      <div class="box comments -gray bottom_top" id="auto-comments-MjQxOTM4MC5wcm9qZWN0dGFza3M">
        <div class="arrow"></div>
        <div class="more" style="display: none;"></div>
        <div class="__comments"></div>
        <div
          class="comment-4566487 comment __origin"
          data-id="4566487"
          data-hid="NDU2NjQ4Ny5wcm9qZWN0Y29tbWVudHM"
          data-token="64fabbd27f93265fbee42e82cc06818725df5601d0a1dcbe6209529e03809216"
          id="comment-4566487"
        >
          <div class="image avatar avatar-32 -rounded">
            <img
              src="https://data-gcdn.basecdn.net/avatar/sys121/2a/6b/da/da/94/00ac0aef87eb9aa4b6206d6ef871ac40/0.nguyenthao_121.jpg"
            />
          </div>
          <div class="text">
            <b href="#" class="a url username std" data-username="nguyenthao">
              Nguyễn
              Thanh Thảo
            </b>&nbsp;
            <span class="message">bổ sung gấp</span>
          </div>
          <div class="info">
            <div class="js-action inline">
              <div class="reaction-wrapper">
                <span class="reaction-default pointer">
                  <span class="-ap icon-thumb_up"></span>&nbsp; Like
                </span>
                <div class="reaction-area">
                  <div
                    class="reaction-box"
                    data-hid="NDU2NjQ4Ny5wcm9qZWN0Y29tbWVudHM"
                    data-token="64fabbd27f93265fbee42e82cc06818725df5601d0a1dcbe6209529e03809216"
                    data-objtype="comment"
                  >
                    <div class="reaction-icon" onclick="Like.react(this, &quot;like&quot;);">
                      <label>Like</label>
                      <div class="reaction-img">
                        <img src="https://share-gcdn.basecdn.net/reactions/like.svg" />
                      </div>
                    </div>
                    <div class="reaction-icon" onclick="Like.react(this, &quot;love&quot;);">
                      <label>Love</label>
                      <div class="reaction-img">
                        <img src="https://share-gcdn.basecdn.net/reactions/love.svg" />
                      </div>
                    </div>
                    <div class="reaction-icon" onclick="Like.react(this, &quot;haha&quot;);">
                      <label>Haha</label>
                      <div class="reaction-img">
                        <img src="https://share-gcdn.basecdn.net/reactions/haha.svg" />
                      </div>
                    </div>
                    <div class="reaction-icon" onclick="Like.react(this, &quot;wow&quot;);">
                      <label>Wow</label>
                      <div class="reaction-img">
                        <img src="https://share-gcdn.basecdn.net/reactions/wow.svg" />
                      </div>
                    </div>
                    <div class="reaction-icon" onclick="Like.react(this, &quot;sad&quot;);">
                      <label>Sad</label>
                      <div class="reaction-img">
                        <img src="https://share-gcdn.basecdn.net/reactions/sad.svg" />
                      </div>
                    </div>
                    <div class="reaction-icon" onclick="Like.react(this, &quot;angry&quot;);">
                      <label>Angry</label>
                      <div class="reaction-img">
                        <img src="https://share-gcdn.basecdn.net/reactions/angry.svg" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>· 15:04 Apr 04
            <div class="comment-reactions">
              <div class="reaction-list rc-0" title="Reactions"></div>
            </div>
          </div>
          <div class="actions"></div>
        </div>
        <div class="post">
          <form method="post" action="api/comment/post">
            <div class="textarea">
              <textarea
                data-hid="MjQxOTM4MC5wcm9qZWN0dGFza3M"
                data-token="5e99d105c0d16bf648083cd87011a106"
                name="comment"
                placeholder="Comment and press Enter to post"
                class="__ap_enter_binded __autoc __autoresized"
                autocomplete="off"
                id="_uuid6116_83942_1586095208"
                style="overflow: hidden; overflow-wrap: break-word; height: 36px;"
              ></textarea>
              <span class="upload">
                <input type="file" name="file" onchange="Comment.pickFile(this);" />
                <span class="-ap icon-upload3"></span>
              </span>
              <div class="comment-file hidden">
                To be uploaded:
                <em>...</em> ·
                <span class="a normal std" onclick="Comment.removePickedFile(this);">remove</span> ·
                <span class="a normal std" onclick="Comment.quickRefPost(this);">post comment</span>
              </div>
              <span class="emoji" onclick="Comment.emoji(this);">
                <span class="-ap icon-happy"></span>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'task-comment'
};
</script>

<style>
</style>
