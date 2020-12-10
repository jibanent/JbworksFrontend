<template>
  <div class="target-achievement-wrapper">
    <page-title-bar />
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <app-card custom-classes="grid-b-space">
          <tree
            :data="treeData"
            :options="treeOptions"
          >
            <div slot-scope="{ node }" class="node-container">
              <h5 class="node-text"><router-link :to="{name: 'department', params: {id: 1, name: node.text}}" class="px-10">{{ node.text }} </router-link></h5>
              <div class="node-controls">
                <router-link :to="{name: 'department', params: {id: 1, name: node.text}}" class="px-10">
                  <i class="text-primary zmdi zmdi-eye" />
                </router-link>
                <a href="#" class="px-10" @click.stop="editNode(node)">
                  <i class="zmdi zmdi-edit" />
                </a>
                <a href="#" class="px-10" @click.stop="removeNode(node)">
                  <i class="text-danger zmdi zmdi-delete" />
                </a>
              </div>
            </div>
          </tree>
        </app-card>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      treeData: [
        {
          name: '地盤事業本部',
          id: 0,
          children: [
            {
              name: '北海道・東北支社',
              id: 3,
              children: []
            },
            {
              name: '東京支社',
              id: 44,
              children: []
            },
           {
             name: '関西支社',
             id: 3,
             children: []
           },
           {
             name: '九州支社',
             id: 3,
             children: []
           },
           {
             name: 'FC運営',
             id: 3,
             children: []
           },                                  
          ]
        },
   {
       name: '住宅DX推進部',
       id: 0,
       children: []
   },
    {
      name: 'JIBANGOO推進部',
      id: 0,
      children: []
    },        
       {
         name: '営業サポート部',
         id: 0,
         children: [
           {
             name: '営業サポート',
             id: 3,
             children: []
           },
           {
             name: '解析',
             id: 44,
             children: []
           },
          {
            name: 'カスタマーサポート',
            id: 3,
            children: []
          },
         ]
       }
      ],
      treeOptions: {
        propertyNames: {
          text: 'name'
        }
      }
    }
  },
  methods: {
    editNode(node, e) {
      node.startEditing()
    },
    removeNode(node) {
      node.remove()
    }
  }
}
</script>

<style lang="scss" scoped>
  .node-container {
    flex: 1;
    display: flex;
    justify-content: space-between;
  }
</style>
