<template>
  <div id="apdialogs" style="display: block;" v-if="true">
    <div class="__wtdialog __apalert __dialog __dialog_ontop">
      <div class="__dialogwrapper" style="top: 50%; left: 50%; transform: translate(-50%, -50%)">
        <div class="__dialogwrapper-inner">
          <div class="__dialogmain">
            <div class="__dialogclose">
              <span class="-ap icon-close"></span>
            </div>
            <div class="__dialogcontent">
              <div id="alert" style class="__apdialog" title>
                <table>
                  <tbody>
                    <tr>
                      <td class="icon">
                        <span
                          class="ficon ficon-exclamation-circle"
                          style="font-size:42px; color:#c65144"
                        ></span>
                      </td>
                      <td
                        class="text"
                      >Bạn có chắc mình muốn xóa công việc này? Bạn không thể khôi phục lại công việc đã bị xóa</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="__dialogbuttons unselectable">
              <div class="button er confirm-button">Close</div>
              <div class="button ss confirm-button">OK</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'confirm-delete-task'
};
</script>

<style>
</style>
