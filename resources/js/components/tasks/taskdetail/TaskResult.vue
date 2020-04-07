<template>
  <div class="section task-result" id="js-taskresult">
    <div class="top">Kết quả công việc</div>
    <div class="postform hidden">
      <div class="textarea -wc-0">
        <div class="completion">
          <div class="label">Hoàn thành</div>
          <input type="text" name="complete" placeholder="Enter %" value="0%" disabled />
          <div class="bar">
            <div class="b" style="width:0.00%"></div>
          </div>
        </div>
        <textarea
          name="content"
          rows="5"
          data-id="2419380"
          placeholder="Cập nhật kết quả công việc"
        ></textarea>
      </div>
      <div class="display">
        <div class="content"></div>
      </div>
      <div class="submit">
        <div class="button js-result-save -cta">Lưu</div>
        <div class="button js-result-cancel -cancel">Bỏ qua</div>
      </div>
      <div class="files"></div>
    </div>
    <div class="cta-block">
      <span class="a normal std js-result-clickable">
        Cập nhật kết quả công
        việc
      </span> hoặc
      <span class="a normal std relative xo js-result-upload uploadable">
        upload
        file
        <div class="upload-form">
          <form method="post" id="_uuid556_58204_1586095208" action="api/task/result.upload">
            <input type="hidden" name="__multi" value="1" />
            <input type="file" name="file[]" id="_uuid54889_53494_1586095208" multiple />
          </form>
        </div>
      </span> ·
      <span class="a normal std relative xo js-drive-result-upload">
        upload from
        base drive
      </span>
    </div>
  </div>
</template>

<script>
export default {
  name: 'task-result'
};
</script>

<style>
</style>
