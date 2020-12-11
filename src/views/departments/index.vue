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
              <h5 class="node-text">{{ node.text }}</h5>
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
          name: 'Department 1',
          id: 0,
          children: [
            {
              name: 'Department 1.1',
              id: 3,
              children: [
                {
                  name: 'Department 1.1.1',
                  id: 4,
                  children: []
                },
                {
                  name: 'Department 1.1.2',
                  id: 10,
                  children: []
                }
              ]
            },
            {
              name: 'Department 1.2',
              id: 13,
              children: []
            }
          ]
        },
        {
          name: 'Department 2',
          id: 14,

          children: [
            {
              name: 'Department 2.1',
              id: 15,
              children: [
                {
                  name: 'Department 2.1.1',
                  id: 16,
                  children: []
                },
                {
                  name: 'Department 2.1.2',
                  id: 17,
                  children: []
                }
              ]
            },
            {
              name: 'Department 2.2',
              id: 18,
              children: [
                {
                  name: 'Department 2.2.1',
                  id: 16,
                  children: []
                },
                {
                  name: 'Department 2.2.2',
                  id: 17,
                  children: []
                }
              ]
            }
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
