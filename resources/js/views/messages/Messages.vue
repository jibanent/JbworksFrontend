<template>
  <div id="msg-root">
    <div class="msg-channel" id="msg-panel">
      <div class="channel-header">
        <div class="channel-gsearch hidden">
          <div class="input apcomplete">
            <input
              placeholder="Find chat groups"
              id="js-channel-gsearch"
              name="q"
              class="__apcomplete_marked marked"
              style="display: none;"
            />
            <input
              type="text"
              name="_uuid57886_88477_1597817035"
              id="_uuid55026_18096_1597817035"
              class="temp disabled __apc_marked_class ui-autocomplete-input"
              value
              placeholder="Find chat groups"
              autocomplete="off"
            />
          </div>
          <div class="close">
            <span class="-ap icon-uniF108"></span>
          </div>
        </div>
        <div class="title ap-xdot">
          <div class="channel-explain -on-collapsed">
            <div class="cr"></div>
            <div class="cus">
              <div class="cx">Mở rộng</div>
            </div>
          </div>
          <span class="count js-total-unread-count" style="display: none;">0</span>TACE COMPANY
        </div>
        <div class="icons">
          <div class="icon js-channel-minus">
            <div class="hexp">
              <div class="txt">Phóng to / Thu nhỏ</div>
            </div>
            <span class="ficon-minus"></span>
          </div>
          <div class="icon js-channel-search" onclick="Message.canvas.activateSearch(this);">
            <div class="hexp">
              <div class="txt">Tìm nhóm chat</div>
            </div>
            <span class="ficon-search"></span>
          </div>
          <div class="icon js-channel-expand url" data-url="https://message.base.vn/home">
            <div class="hexp">
              <div class="txt">Chuyển đến trang Message</div>
            </div>
            <span class="-ap icon-open"></span>
          </div>
        </div>
      </div>
      <div class="tabs">
        <div class="tab js-tab js-tab-messages active" data-tab="messages">Messages</div>
        <div class="tab js-tab js-tab-channels" data-tab="channels" style="display: none"># Channels</div>
        <div class="tab js-tab js-tab-people" data-tab="people">
          <span class="-ap icon-controller-record text-success"></span>&nbsp; Online
          <span class="count js-online-count">&nbsp; 4</span>
        </div>
        <div class="tab js-tab-create" onclick="Message.create.channel();">+ New</div>
      </div>
      <div class="sections scrollable __set __apscrollbar_parent" data-autoscroll="1">
        <div
          class="scrollin absolute __apscrollbar_target __scrolled __regular"
          id="_uuid16291_30690_1597817035"
          style="right: -17px; top: 0px; left: 0px; bottom: 0px;"
        >
          <div class="__apscrollbar_wrap">
            <div class="section section-messages active">
              <div
                class="item is-channel js-channel-42801"
                onclick="Channel.open(42801,{'intent':'panel'});"
              >
                <div class="channel-image">
                  <div class="avatars -four">
                    <div class="avatar -first -bb -br">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/4d/86/5f/b0/56/8f60a570c09c17960699115b25555a46/1.tranmanh_121.jpg"
                      />
                    </div>
                    <div class="avatar -second -bb">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/3d/95/25/9e/cb/7939261f533c0cb7c704c81b763281d8/1.quynhtrang_121.jpg"
                      />
                    </div>
                    <div class="avatar -third -bl">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/64/6b/1c/8b/f4/c406e7dca53bc27a0676e22ecf912de3/1.thuytrang_121.jpg"
                      />
                    </div>
                    <div class="avatar -forth">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/6b/a0/8d/cf/92/a2cae15219e1d9f9469d22afaa5d874f/1.thaont_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">TACE COMPANY</div>
                <div class="channel-lm">
                  <div class="tinyavt">
                    <img
                      src="https://data-gcdn.basecdn.net/avatar/sys121/6b/a0/8d/cf/92/a2cae15219e1d9f9469d22afaa5d874f/0.thaont_121.jpg"
                    />
                  </div>
                  <div class="msg">
                    <div class="ap-xdot">
                      <em>Thảo</em> Thảo Nguyễn Thu đang gọi điện cho bạn ...
                    </div>
                  </div>
                </div>
                <div class="unread-count">0</div>
              </div>
              <div
                class="item is-channel js-channel-69607"
                onclick="Channel.open(69607,{'intent':'panel'});"
              >
                <div class="channel-image">
                  <div class="avatars -three">
                    <div class="avatar -first">
                      <img src="https://data-gcdn.basecdn.net/image/1.noavatar.png" />
                    </div>
                    <div class="avatar -second -bb -bl">
                      <img src="https://data-gcdn.basecdn.net/image/1.noavatar.png" />
                    </div>
                    <div class="avatar -third -bl">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/64/6b/1c/8b/f4/c406e7dca53bc27a0676e22ecf912de3/1.thuytrang_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Ngọc Anh, Thảo, Trang</div>
                <div class="channel-lm">
                  <div class="tinyavt">
                    <img
                      src="https://data-gcdn.basecdn.net/avatar/sys121/64/6b/1c/8b/f4/c406e7dca53bc27a0676e22ecf912de3/0.thuytrang_121.jpg"
                    />
                  </div>
                  <div class="msg">
                    <div class="ap-xdot">
                      <em>Trang</em>: ok chị
                    </div>
                  </div>
                </div>
                <div class="unread-count">0</div>
              </div>
              <div
                class="item is-channel js-channel-31728"
                onclick="Channel.open(31728,{'intent':'panel'});"
              >
                <div class="channel-image">
                  <div class="avatars -four">
                    <div class="avatar -first -bb -br">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/20/20/6a/c4/aa/810e257e52c7ac3bb6a79881095998d2/1.hanghoang_121.jpg"
                      />
                    </div>
                    <div class="avatar -second -bb">
                      <img src="https://data-gcdn.basecdn.net/image/1.noavatar.png" />
                    </div>
                    <div class="avatar -third -bl">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/64/6b/1c/8b/f4/c406e7dca53bc27a0676e22ecf912de3/1.thuytrang_121.jpg"
                      />
                    </div>
                    <div class="avatar -forth">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/f7/e4/28/6a/67/83d6545a14774d8f5f7c7a6cc93923c1/1.phuonganh_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Phần mềm</div>
                <div class="channel-lm">
                  <div class="tinyavt">
                    <img
                      src="https://data-gcdn.basecdn.net/avatar/sys121/20/20/6a/c4/aa/810e257e52c7ac3bb6a79881095998d2/0.hanghoang_121.jpg"
                    />
                  </div>
                  <div class="msg">
                    <div class="ap-xdot">
                      <em>Minh Hằng</em> thêm Hoàng Hằng vào nhóm chat
                    </div>
                  </div>
                </div>
                <div class="unread-count">0</div>
              </div>
              <div
                class="item is-channel js-channel-69230"
                onclick="Channel.open(69230,{'intent':'panel'});"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/4f/a8/90/20/d3/d630a3cb389f6310bf4a58f9c099189b/1.hang211_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Hoàng Hằng</div>
                <div class="channel-lm">
                  <div class="tinyavt">
                    <img
                      src="https://data-gcdn.basecdn.net/avatar/sys121/4f/a8/90/20/d3/d630a3cb389f6310bf4a58f9c099189b/0.hang211_121.jpg"
                    />
                  </div>
                  <div class="msg">
                    <div class="ap-xdot">
                      <em>Hằng</em>: dạ
                    </div>
                  </div>
                </div>
                <div class="unread-count">0</div>
              </div>
              <div
                class="item is-channel js-channel-25190"
                onclick="Channel.open(25190,{'intent':'panel'});"
              >
                <div class="channel-image">
                  <div class="avatars -four">
                    <div class="avatar -first -bb -br">
                      <img src="https://data-gcdn.basecdn.net/image/1.noavatar.png" />
                    </div>
                    <div class="avatar -second -bb">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/23/80/01/93/ed/c7a0167e5b71217c66f6c00adcef2c2c/1.vunguyen_121.jpg"
                      />
                    </div>
                    <div class="avatar -third -bl">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/64/6b/1c/8b/f4/c406e7dca53bc27a0676e22ecf912de3/1.thuytrang_121.jpg"
                      />
                    </div>
                    <div class="avatar -forth">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/4d/86/5f/b0/56/8f60a570c09c17960699115b25555a46/1.tranmanh_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Team MKT</div>
                <div class="channel-lm">
                  <div class="tinyavt">
                    <img
                      src="https://data-gcdn.basecdn.net/avatar/sys121/64/6b/1c/8b/f4/c406e7dca53bc27a0676e22ecf912de3/0.thuytrang_121.jpg"
                    />
                  </div>
                  <div class="msg">
                    <div class="ap-xdot">
                      <em>Trang</em>: alo
                    </div>
                  </div>
                </div>
                <div class="unread-count">0</div>
              </div>
              <div
                class="item is-channel js-channel-60607"
                onclick="Channel.open(60607,{'intent':'panel'});"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/6b/a0/8d/cf/92/a2cae15219e1d9f9469d22afaa5d874f/1.thaont_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Nguyễn Thu Thảo</div>
                <div class="channel-lm">
                  <div class="tinyavt">
                    <img
                      src="https://data-gcdn.basecdn.net/avatar/sys121/64/6b/1c/8b/f4/c406e7dca53bc27a0676e22ecf912de3/0.thuytrang_121.jpg"
                    />
                  </div>
                  <div class="msg">
                    <div class="ap-xdot">
                      <em>Trang</em> chia sẻ file img9708.jpg
                    </div>
                  </div>
                </div>
                <div class="unread-count">0</div>
              </div>
              <div
                class="item is-channel js-channel-26560"
                onclick="Channel.open(26560,{'intent':'panel'});"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/23/80/01/93/ed/c7a0167e5b71217c66f6c00adcef2c2c/1.vunguyen_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Nguyễn Vũ</div>
                <div class="channel-lm">
                  <div class="tinyavt">
                    <img
                      src="https://data-gcdn.basecdn.net/avatar/sys121/64/6b/1c/8b/f4/c406e7dca53bc27a0676e22ecf912de3/0.thuytrang_121.jpg"
                    />
                  </div>
                  <div class="msg">
                    <div class="ap-xdot">
                      <em>Trang</em> chia sẻ file screenshot-2019-08-10-at-09.31.10.png
                    </div>
                  </div>
                </div>
                <div class="unread-count">0</div>
              </div>
              <div
                class="item is-channel js-channel-42834"
                onclick="Channel.open(42834,{'intent':'panel'});"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/20/20/6a/c4/aa/810e257e52c7ac3bb6a79881095998d2/1.hanghoang_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Hoàng Trần Minh Hằng</div>
                <div class="channel-lm">
                  <div class="tinyavt">
                    <img
                      src="https://data-gcdn.basecdn.net/avatar/sys121/20/20/6a/c4/aa/810e257e52c7ac3bb6a79881095998d2/0.hanghoang_121.jpg"
                    />
                  </div>
                  <div class="msg">
                    <div class="ap-xdot">
                      <em>Minh Hằng</em>: haha
                    </div>
                  </div>
                </div>
                <div class="unread-count">0</div>
              </div>
              <div
                class="item is-channel js-channel-24973"
                onclick="Channel.open(24973,{'intent':'panel'});"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/2e/30/c2/4a/6c/6590fd2b8f3e3b1c99d46620ae2c0ba6/1.vananh_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Vân Anh</div>
                <div class="channel-lm">
                  <div class="tinyavt">
                    <img
                      src="https://data-gcdn.basecdn.net/avatar/sys121/64/6b/1c/8b/f4/c406e7dca53bc27a0676e22ecf912de3/0.thuytrang_121.jpg"
                    />
                  </div>
                  <div class="msg">
                    <div class="ap-xdot">
                      <em>Trang</em>: @vananh
                    </div>
                  </div>
                </div>
                <div class="unread-count">0</div>
              </div>
            </div>
            <div class="section section-channels"></div>
            <div class="section section-people">
              <div class="panel-search">
                <input
                  type="text"
                  placeholder="Tìm nhanh thành viên"
                  name="search"
                  id="js-panel-psearch"
                />
              </div>
              <div
                class="item js-person"
                data-kw="vunguyen nguyen vu CBO"
                onclick="Base.message.peer('11981');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/23/80/01/93/ed/c7a0167e5b71217c66f6c00adcef2c2c/1.vunguyen_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Nguyễn Vũ</div>
                <div class="signal -online"></div>
              </div>
              <div
                class="item js-person"
                data-kw="vananh van anh Business Development Manager"
                onclick="Base.message.peer('697');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/2e/30/c2/4a/6c/6590fd2b8f3e3b1c99d46620ae2c0ba6/1.vananh_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Vân Anh</div>
                <div class="signal -online"></div>
              </div>
              <div
                class="item js-person"
                data-kw="chivu vu yen chi "
                onclick="Base.message.peer('62993');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/04/4a/27/63/92/7ec662785130da3b626a68e92679fe98/1.chivu_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Vũ Yến Chi</div>
                <div class="signal -online"></div>
              </div>
              <div
                class="item js-person"
                data-kw="thuytrang thuy trang CMO"
                onclick="Base.message.peer('9136');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/64/6b/1c/8b/f4/c406e7dca53bc27a0676e22ecf912de3/1.thuytrang_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Thùy Trang</div>
                <div class="signal -online"></div>
              </div>
              <div class="sep">Offline</div>
              <div
                class="item js-person"
                data-kw="minhlv mr minh "
                onclick="Base.message.peer('125234');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/6c/56/18/e0/51/8d523f54bc2c5201d3e3ccef5f64598a/1.minhlv_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Mr Minh</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="tungls ls tung Phó công nhân"
                onclick="Base.message.peer('125232');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/48/bb/ea/f8/1c/a7b8bc281c943fbd1a4454257c325b40/1.tungls_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">LS Tung</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="hatung ha tung "
                onclick="Base.message.peer('116982');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/7a/17/20/6a/64/26a7e906c235d0fc5841410777e996ee/1.hatung_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Hà Tùng</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="buitu bui tu "
                onclick="Base.message.peer('114692');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/db/9c/ae/bc/ff/86d644e39189234d74edeb75c69c0116/1.buitu_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Bùi Tự</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="pttxuan ms xuan "
                onclick="Base.message.peer('111861');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/5d/ed/13/32/5b/43e59a964cbdecefd032d801077dda6d/1.pttxuan_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Ms Xuân</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="Manhhiep mr hiep "
                onclick="Base.message.peer('111860');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/8f/33/43/7d/14/f8522b406a7c96c1913334793ab9a272/1.Manhhiep_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Mr Hiệp</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="thien nguyen duy thien Điều Hành"
                onclick="Base.message.peer('110749');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/47/73/c4/1e/f7/a51d5634c42498410f490b31c4a84ce2/1.thien_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Nguyễn Duy Thiện</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="thiennd nguyen duy thien "
                onclick="Base.message.peer('110748');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/f5/d2/ee/84/5e/5c90a9acd449ad13e3786d3f5b2d3c87/1.thiennd_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Nguyễn Duy Thiện</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="thaobui bui phuong thao "
                onclick="Base.message.peer('110254');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/40/d6/a7/40/9f/8cff5b9ed29ea0885a9e226cf36b9703/1.thaobui_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Bùi Phương Thảo</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="phantv tran van phan "
                onclick="Base.message.peer('110190');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/72/6d/4e/09/ea/0c3f09038d483f37a8bebac58166a40c/1.phantv_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Trần Văn Phan</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="hanhnguyen_ext nguyen thi hanh Guest account - account"
                onclick="Base.message.peer('108826');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/44/c6/5c/9a/6e/78378a114c50a5116bdd0924e802fe8c/1.hanhnguyen_ext_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Nguyễn Thị Hạnh</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="tungnguyen nguyen tung "
                onclick="Base.message.peer('108675');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/74/0e/b7/1a/e0/d7b1b36ed96fa3752c633703f6dbad95/1.tungnguyen_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Nguyễn Tùng</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="Ledo chi le "
                onclick="Base.message.peer('108674');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/77/2d/0e/c1/6a/3bcee27bc09f35fc08588e0e4fa86ff3/1.Ledo_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Chị Lê</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="thaotran tran thao "
                onclick="Base.message.peer('108153');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/d6/50/71/11/c2/84f40d331b624494acdcc14782bb9e10/1.thaotran_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Trần Thảo</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="havanxinhdep_ext ha van Guest account - account"
                onclick="Base.message.peer('107364');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/88/31/df/66/83/3bf606763c0d060764bae15081b414f6/1.havanxinhdep_ext_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Hà Vân</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="hieucao cao trung hieu Trưởng nhóm Marketing"
                onclick="Base.message.peer('102275');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/2a/47/71/e1/07/878e235e974f45e8894e27484c7d950b/1.hieucao_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Cao Trung Hiếu</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="BPkhailq base partner le quang khai "
                onclick="Base.message.peer('101987');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/cc/d1/7f/ff/7f/ac2f2b131d23574970e25ab35d90fe75/1.BPkhailq_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Base Partner Lê Quang Khải</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="BAharaplus base partner haraplus "
                onclick="Base.message.peer('101385');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/90/d8/d9/55/39/43052188dc16832b9a717d932f110cbb/1.BAharaplus_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Base Partner Haraplus</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="BPlongnguyen base partner long nguyen "
                onclick="Base.message.peer('101384');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/63/ed/d9/e5/20/e68cbbfca252a431c498b45c7e5224f2/1.BPlongnguyen_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Base Partner Long Nguyễn</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="BAthaohuong base ambassador ma thao huong "
                onclick="Base.message.peer('101382');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/42/48/8f/ad/6a/e7812483956b7217cda0b461adc7c932/1.BAthaohuong_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Base Ambassador - Ma Thảo Hương</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="hieuct967 trung hieu Chuyên viên thiết kế"
                onclick="Base.message.peer('96357');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/3c/08/23/9d/ea/f996f17fe7bf255b2ae29f8885499fb3/1.hieuct967_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Trung Hiếu</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="khiemtran partner tran khiem "
                onclick="Base.message.peer('96120');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/45/fb/58/58/3f/ff353ada4956cbdaf1e11a53172c28b7/1.khiemtran_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Partner - Trần Khiêm</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="luongminhhai partner luong minh hai "
                onclick="Base.message.peer('96119');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/82/d8/85/c2/e0/c4e9fa8e8131bf095aea21f9ee1e6b63/1.luongminhhai_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Partner Lương Minh Hải</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="nguyenkdung97 nguyen khoa dung MKT Base"
                onclick="Base.message.peer('91991');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/c1/e7/35/69/9b/6805bee13cf7037ca9c2ebf1ca3e21dc/1.nguyenkdung97_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Nguyễn Khoa Dũng</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="monguyen nguyen huong mo "
                onclick="Base.message.peer('91934');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/09/b6/4e/6f/89/0b0724a3f734867ba146def451b5d75a/1.monguyen_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Nguyễn Hương Mơ</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="songnhi_ext manh tran Guest account - account"
                onclick="Base.message.peer('85349');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/7e/0f/15/93/3e/b84836ad992764c5c8f1749b159c067b/1.songnhi_ext_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Mạnh Trần</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="tradima_ext tran dinh manh Guest account - account"
                onclick="Base.message.peer('85348');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/49/a0/f3/f9/80/87a613cc4342bac2ef12da30ec67ef0f/1.tradima_ext_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Trần Đình Mạnh</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="hang211 hoang hang "
                onclick="Base.message.peer('83466');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/4f/a8/90/20/d3/d630a3cb389f6310bf4a58f9c099189b/1.hang211_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Hoàng Hằng</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="phuonganhluu phuong anh luu "
                onclick="Base.message.peer('73174');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/3a/55/21/65/1a/167ffeac211de536e58601a194310759/1.phuonganhluu_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Phuong Anh Luu</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="yenchi chi vu Test"
                onclick="Base.message.peer('72169');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/11/47/5b/4f/e4/70b372f83b78512d4a03f0b935dd0e2f/1.yenchi_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Chi Vũ</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="khtuyetnguyen nguyen tuyet Quản lí"
                onclick="Base.message.peer('71072');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/db/10/d9/e9/5f/79c607747859f41efc35935a36639b80/1.khtuyetnguyen_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Nguyễn Tuyết</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="Sallybase sally bui BDM"
                onclick="Base.message.peer('70433');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/f5/e1/f6/3e/9c/f271e04f21458e5eaedc384777c6b199/1.Sallybase_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Sally Bui</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="longkim kim duc long "
                onclick="Base.message.peer('70089');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/3b/d9/56/a6/02/e2e064443bacac8f8be214b8f7d7391a/1.longkim_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Kim Đức Long</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="anhuyen nguyen huyen an "
                onclick="Base.message.peer('56985');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/f8/1d/fb/91/0e/317cd25f10f0b01b2bf7811a69325949/1.anhuyen_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Nguyễn Huyền An</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="linhngo ngo khanh linh "
                onclick="Base.message.peer('55862');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/52/69/db/ce/6c/08dbe69661af1dfb8626fa4683c0304f/1.linhngo_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Ngô Khánh Linh</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="baotrinh trinh bao COO @ Base.vn"
                onclick="Base.message.peer('53474');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/e1/d4/86/08/5d/f4792d9c60b706376aad76e7f4699c5c/1.baotrinh_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Trịnh Bảo</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="linhdan do pham linh dan "
                onclick="Base.message.peer('52805');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/95/17/5c/cd/23/a4ecbba291849fb3ef99a65e574bdf9f/1.linhdan_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Đỗ Phạm Linh Đan</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="linhnk ngo khanh linh "
                onclick="Base.message.peer('52706');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/fc/94/47/cd/a5/3ebe96bddd2f98b726a9b0e5e246482a/1.linhnk_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Ngo Khanh Linh</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="thanhnt nguyen thi thanh COO"
                onclick="Base.message.peer('52705');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/9a/29/0d/88/1b/8d3362825de7bb4a680d3edccc99df4e/1.thanhnt_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Nguyễn Thị Thành</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="anhtaotuan tao tuan anh Quản lí"
                onclick="Base.message.peer('52049');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/3e/6f/9f/53/b8/77ac043c7c9e89fd3c63bac9bc49debb/1.anhtaotuan_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Tào Tuấn Anh</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="huyennt54ftu nguyen huyen COO"
                onclick="Base.message.peer('46139');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/eb/44/3c/ad/96/c82698fd1b4c14ddde3e2c676d18e314/1.huyennt54ftu_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Nguyễn Huyền</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="vuanh vu anh CEO"
                onclick="Base.message.peer('43565');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/ba/f9/d1/47/30/e7a5093c5bf356d492e3279e55b99a82/1.vuanh_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Vu Anh</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="thaonguyen nguyen thao Test"
                onclick="Base.message.peer('32922');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/e8/ac/ab/26/ec/8b881dc8496e769af7ab6eea93813095/1.thaonguyen_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Nguyễn Thảo</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="giangle le giang Business Consultant"
                onclick="Base.message.peer('29066');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/d4/a6/12/a6/91/8208ff221b7a78ca51b0ec4fe632c89f/1.giangle_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Lê Giang</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="thaont nguyen thu thao Manager"
                onclick="Base.message.peer('28640');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/6b/a0/8d/cf/92/a2cae15219e1d9f9469d22afaa5d874f/1.thaont_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Nguyễn Thu Thảo</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="lyvt vu thi ly 1. Business Consultant"
                onclick="Base.message.peer('28601');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/8a/48/b7/71/51/5616cc41b72eb953156c8d790a595ed1/1.lyvt_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Vũ Thị Lý</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="quynhtrang nguyen trang "
                onclick="Base.message.peer('24121');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/3d/95/25/9e/cb/7939261f533c0cb7c704c81b763281d8/1.quynhtrang_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Nguyễn Trang</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="hanh nguyen hanh Kế toán"
                onclick="Base.message.peer('24120');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/73/bf/9a/fd/f5/a9a06abbeea412e6cedcbede7a2274cf/1.hanh_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Nguyễn Hạnh</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="vannguyen nguyen van "
                onclick="Base.message.peer('24119');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/b0/b7/32/c6/91/ad2d201c8b26196c38a6b0c0493007e3/1.vannguyen_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Nguyễn Vân</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="vanny nguyen yen van "
                onclick="Base.message.peer('21487');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/2a/94/0b/c7/85/eea34abe105e1ea035b362da68c66cbb/1.vanny_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Nguyễn Yến Vân</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="phuonganh luu phuong anh Giám Đốc"
                onclick="Base.message.peer('20091');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/f7/e4/28/6a/67/83d6545a14774d8f5f7c7a6cc93923c1/1.phuonganh_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Lưu Phương Anh</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="linhtran tran thi khanh linh "
                onclick="Base.message.peer('20025');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/ce/53/06/dd/a5/f244ef6685531c0b5dac31086d08c115/1.linhtran_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Trần Thị Khánh Linh</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="hanghoang hoang tran minh hang GĐ"
                onclick="Base.message.peer('17690');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/20/20/6a/c4/aa/810e257e52c7ac3bb6a79881095998d2/1.hanghoang_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Hoàng Trần Minh Hằng</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="tuyetnguyen nguyen tuyet TP HCNS"
                onclick="Base.message.peer('16236');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/bf/cb/99/5c/c4/4f2d919fdc90fcff8406d552282383a2/1.tuyetnguyen_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Nguyễn Tuyết</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="tranmanh tran dinh manh Business Consultant"
                onclick="Base.message.peer('16153');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/4d/86/5f/b0/56/8f60a570c09c17960699115b25555a46/1.tranmanh_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Trần Đình Mạnh</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="lehien_ext vu van truc Guest account - account"
                onclick="Base.message.peer('13630');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/e7/09/15/ab/7d/9a33a12657300659fb0cc3b0195e4a15/1.lehien_ext_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Vũ Văn Trực</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="giangnguyen nguyen giang "
                onclick="Base.message.peer('10810');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/19/ce/f1/12/fa/8004ae32709fb70899d68a4311f4f855/1.giangnguyen_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Nguyễn Giang</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="nguyen123_ext nguyen nguyen Guest account - account"
                onclick="Base.message.peer('1346');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/1e/9e/75/49/98/0f75791a8a58d8f6d15b264b257892cb/1.nguyen123_ext_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Nguyên Nguyên</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="duong_ext binh duong Guest account - account"
                onclick="Base.message.peer('1344');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/b0/91/ba/be/37/3a908dd1f27da2c9741b9bd9c2422cb9/1.duong_ext_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Bình Dương</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="an_ext ngo chung Guest account - wework"
                onclick="Base.message.peer('1225');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/54/a4/ad/b7/cf/ee7896b006ca0698fdcd5a9acbd6ac98/1.an_ext_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Ngô Chung</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="giangabc_ext giang abc Guest account - wework"
                onclick="Base.message.peer('1221');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/38/e8/9d/d9/ce/10ec491e2192ab7e16ece74803f7a08b/1.giangabc_ext_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Giang abc</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="hello_ext chu giang Guest account - wework"
                onclick="Base.message.peer('1218');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/7f/41/63/8c/2e/21c96e515c85f7271dce3ad4404eefd6/1.hello_ext_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">chu giang</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="phuongbe_ext phung phuong Guest account - wework"
                onclick="Base.message.peer('1204');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/6f/77/aa/8e/ce/a6d7a2ef61ce05f487a0014f43cc48c3/1.phuongbe_ext_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">Phùng Phương</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="giang_ext chu giang Guest account - wework"
                onclick="Base.message.peer('1180');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/52/7c/6f/bd/37/fff4976a37ccf950037841f204262831/1.giang_ext_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">chu giang</div>
                <div class="signal -offline"></div>
              </div>
              <div
                class="item js-person"
                data-kw="phuong_ext phuong be Guest account - wework"
                onclick="Base.message.peer('1179');"
              >
                <div class="channel-image">
                  <div class="image">
                    <div class="single">
                      <img
                        src="https://data-gcdn.basecdn.net/avatar/sys121/89/ef/fa/fc/1c/ad6b921bb80170105d34920873d85d20/1.phuong_ext_121.jpg"
                      />
                    </div>
                  </div>
                </div>
                <div class="name ap-xdot">phương bé</div>
                <div class="signal -offline"></div>
              </div>
            </div>
          </div>
        </div>
        <div id="_uuid16291_30690_1597817035__apscrollbar" class="__apscrollbar">
          <div class="scroller ui-draggable ui-draggable-handle" style>
            <div class="sinner"></div>
          </div>
        </div>
      </div>
    </div>
    <div id="js-msg-boxes" class="msg-boxes"></div>
  </div>
</template>

<script>
export default {
  name: 'messages'
};
</script>

<style>
</style>
