<template>
  <div class="permission-wrapper">
    <app-card custom-classes="page-title rounded-0">
      <h5 class="text-capitalize mb-0">{{ $t('message.platformAdministrationRoleAndPermission') }} / Admin</h5>
    </app-card>
    <page-title-bar />
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
        <app-card custom-classes="grid-b-space">
          <b-form>
            <b-form-group :label="$t('message.name')" label-for="role">
              <b-form-input
                id="role"
                type="text"
                class="mb-30"
                value="Admin"
              />
            </b-form-group>
            <b-form-group :label="$t('message.description')" label-for="description">
              <b-form-textarea id="description" rows="3" />
            </b-form-group>
          </b-form>
        </app-card>
        <app-card custom-classes="grid-b-space">
          <tree
            class="tree--small"
            :data="treeData"
            :options="treeOptions"
          >
            <span slot-scope="{ node }" class="tree-text">
              <template v-if="!node.hasChildren()">
                {{ node.text }}
              </template>

              <template v-else>
                <span class="badge badge-warning">{{ node.text }}</span>
              </template>
            </span>
          </tree>
        </app-card>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <app-card :heading="$t('message.action')">
          <button type="button" class="btn d-inline-flex align-items-center text-capitalize btn-primary">
            <i class="material-icons btn-icon mr-1">save</i>{{ $t('message.save') }}
          </button>
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
          name: 'All permission',
          state: { expanded: true },
          children: [
            {
              name: 'Users',
              children: [
                {
                  name: 'View',
                  state: { checked: true }
                },
                {
                  name: 'Create',
                  state: { checked: true }
                },
                {
                  name: 'Edit',
                  state: { checked: true }
                },
                {
                  name: 'Delete',
                  state: { checked: true }
                }
              ]
            },
            {
              name: 'Customers',
              children: [
                {
                  name: 'View'
                },
                {
                  name: 'Create',
                  state: { checked: true }
                },
                {
                  name: 'Edit',
                  state: { checked: true }
                },
                {
                  name: 'Delete'
                }
              ]
            },
            {
              name: 'Tasks',
              children: [
                {
                  name: 'View'
                },
                {
                  name: 'Create'
                },
                {
                  name: 'Edit'
                },
                {
                  name: 'Delete'
                }
              ]
            },
            {
              name: 'Departments',
              children: [
                {
                  name: 'View'
                },
                {
                  name: 'Create'
                },
                {
                  name: 'Edit'
                },
                {
                  name: 'Delete'
                }
              ]
            }
          ]
        }
      ],
      treeOptions: {
        checkbox: true,
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