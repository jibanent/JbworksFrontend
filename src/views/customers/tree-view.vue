<template>
  <div id="responsive-table p">
    <div class="mb-4">
      <tree-table
        ref="table"
        sum-text="sum"
        :data="data"
        :columns="columns"
        :stripe="true"
        :border="false"
        :show-header="true"
        :show-row-hover="true"
        :show-index="false"
        :selection-type="false"
        select-type="checkbox"
        :is-fold="true"
        :expand-type="false"
        expand-key="name"
      >
        <template slot="action">
          <div class="d-flex">
            <router-link :to="{name: 'customer', params: {id: 1}}" href="javascript:;" class="icon-btn bg-white">
              <i class="zmdi zmdi-eye text-primary" />
            </router-link>
            <a href="javascript:;" class="icon-btn bg-white">
              <i class="zmdi zmdi-edit text-sencondary" />
            </a>
            <a href="javascript:;" class="icon-btn bg-white">
              <i class="zmdi zmdi-close text-danger" />
            </a>
          </div>
        </template>
      </tree-table>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      data: [
        {
          name: 'Vinfast',
          phone: '0123456789',
          email: 'example@gmail.com',
          children: [
            {
              name: 'Vinfast 1',
              phone: '0123456789',
              email: 'example@gmail.com'
            },
            {
              name: 'Vinfast 2',
              phone: '0123456789',
              email: 'example@gmail.com'
            }
          ]
        },
        {
          name: 'Tiki',
          phone: '0123456789',
          email: 'example@gmail.com',
          children: [
            {
              name: 'Tiki 1',
              phone: '0123456789',
              email: 'example@gmail.com'
            },
            {
              name: 'Tiki 2',
              phone: '0123456789',
              email: 'example@gmail.com'
            }
          ]
        },
        {
          name: 'Instagram',
          phone: '0123456789',
          email: 'example@gmail.com'
        },
        {
          name: 'Suzuki',
          phone: '0123456789',
          email: 'example@gmail.com',
          children: [
            {
              name: 'Suzuki 1',
              phone: '0123456789',
              email: 'example@gmail.com'
            },
            {
              name: 'Suzuki 2',
              phone: '0123456789',
              email: 'example@gmail.com'
            }
          ]
        }
      ],
      columns: [
        {
          title: this.$t('message.companyName'),
          key: 'name',
          minWidth: '200px'
        },
        {
          title: this.$t('message.phone'),
          key: 'phone',
          minWidth: '120px'
        },
        {
          title: this.$t('message.email'),
          key: 'email',
          minWidth: '200px'
        },
        {
          title: this.$t('message.action'),
          key: 'action',
          minWidth: '200px',
          type: 'template',
          template: 'action'
        }
      ]
    }
  },
  methods: {
    clickRow() {
      return false
    }
  }
}
</script>
