<template>
  <div id="apdialogs" style="width: 1937px; display: none;">
    <div
      class="__fdialog __temp __dialog __dialog_ontop"
      id="__apdialog_fly-rp-dx"
      style="right: 17px;"
    >
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper" style="top: 126.5px; left: 700px;">
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div
                    class="__dialogtitle unselectable ap-xdot"
                    onclick="AP.dialog(&quot;#fly-rp-dx&quot;).balance();"
                  >Select duration</div>
                  <div class="__dialogtitlerender tx-fill"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="__dialogclose" onclick="AP.dialog(&quot;#fly-rp-dx&quot;).hide();">
                <span class="-ap icon-close"></span>
              </div>
              <div class="__dialogcontent">
                <div id="fly-rp-dx" class="__apdialog" title style="width: 480px;">
                  <div class="form form-dialog -flat">
                    <form method="post" id="fly-rp-fx" action="about:blank">
                      <div class="row -istext -active" id="_uuid16491_53349_1586703699">
                        <div class="label">Start date *</div>
                        <div class="input data">
                          <span
                            class="-ap icon-uniF1072"
                            style="position: absolute; right:10px; top:10px; color:#aaa; font-size:16px;"
                          ></span>
                          <input
                            autocomplete="off"
                            data-role="date"
                            id="_uuid75787_64013_1586703699"
                            type="text"
                            name="start"
                            placeholder="Start date"
                            class="std hasDatepicker"
                          />
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -istext -active" id="_uuid16514_24294_1586703699">
                        <div class="label">End date *</div>
                        <div class="input data">
                          <span
                            class="-ap icon-uniF1072"
                            style="position: absolute; right:10px; top:10px; color:#aaa; font-size:16px;"
                          ></span>
                          <input
                            autocomplete="off"
                            data-role="date"
                            id="_uuid55106_18556_1586703699"
                            type="text"
                            name="end"
                            placeholder="End date"
                            class="std hasDatepicker"
                          />
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div style="display:none">
                        <input type="hidden" name="__code" value="944c462d7ab7ff6900ffa7d0463e3c41" />
                      </div>
                      <div class="form-buttons -two">
                        <div class="button ok -success -rounded bold">Okay</div>
                        <div class="button cancel -passive-2 -rounded">Hủy</div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'dialog-select-duration'
};
</script>

<style>
</style>
