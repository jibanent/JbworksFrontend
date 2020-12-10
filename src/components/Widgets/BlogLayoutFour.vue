<template>
  <app-card custom-classes="blog-layout four h-100" :heading="$t('message.addNewBlogItem')" :heading-menu="true">
    <b-form @submit="onSubmit">
      <dropzone
        id="myVueDropzone"
        url="https://httpbin.org/post"
        class="mb-30"
        :options="dropzoneOptions"
        @vdropzone-success="showSuccess"
      >
        <input type="hidden" name="token" value="xxx">
      </dropzone>
      <b-form-group id="exampleInputGroup1" :label="$t('message.blogTitle')" label-for="blogTitle">
        <b-form-input
          id="blogTitle"
          v-model="form.blogTitle"
          type="text"
          required
          placeholder="Blog Title"
          class="mb-30"
        />
        <div class="mb-30">
          <label class="desc">{{ $t('message.description') }}</label>
          <wysiwyg v-model="myHTML" />
        </div>
        <div class="d-flex justify-content-between align-items-center icon-btn-wrap">
          <div class="d-sm-flex btn-wrap">
            <b-button class="mb-xs-2 text-capitalize" variant="primary" size="sm">{{ $t('message.postBlog') }}
            </b-button>
            <b-button variant="warning" class="text-capitalize" size="sm">{{ $t('message.scheduleLater') }}
            </b-button>
          </div>
          <a href="javascript:;" class="icon-btn md">
            <i class="text-danger zmdi zmdi-delete font-lg" />
          </a>
        </div>
      </b-form-group>
    </b-form>
  </app-card>
</template>

<script>
import Dropzone from 'vue2-dropzone'

export default {
  components: {
    Dropzone
  },
  data() {
    return {
      dropzoneOptions: {
        url: 'https://httpbin.org/post',
        thumbnailWidth: 150,
        maxFilesize: 0.5,
        headers: { 'My-Awesome-Header': 'header value' }
      },
      form: {
        blogTitle: ''
      },
      myHTML: ''
    }
  },
  methods: {
    onSubmit(evt) {
      evt.preventDefault()
      alert(JSON.stringify(this.form))
    },
    showSuccess(file) {
      console.log('A file was successfully uploaded')
    }
  }
}
</script>
