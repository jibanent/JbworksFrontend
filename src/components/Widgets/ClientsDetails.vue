<template>
  <div class="clients-list-wrap ">
    <b-tabs>
      <b-tab :title="$t('message.allClients')">
        <div class="row">
          <template v-for="(details,tabName,index) in clientData">
            <div
              v-for="(details,keyy,i) in clientData[tabName]"
              :key="i"
              class="mb-30 col-12 col-sm-6 col-md-4 col-lg-3"
            >
              <app-card custom-classes="mb-0 client-item">
                <div :key="index" class="text-center position-relative">
                  <div class="thumb-wrap mb-3 ">
                    <img :src="details.image" class="rounded-lg">
                  </div>
                  <div class="client-content">
                    <h4 class="mb-2 text-primary">{{ details.name }}</h4>
                    <div class="contact-links text-truncate mb-1 fs-14">
                      <a class="" href="javascript:void(0)">{{ details.e_mail }}</a>
                    </div>
                    <div class="contact-links fs-14 text-truncate mb-1">
                      <a class="" href="javascript:void(0)">{{ details.phone_number }}</a>
                    </div>
                    <div class="fs-14 text-truncate mb-1">{{ details.country }}</div>
                  </div>
                  <div class="action-btn-wrap">
                    <b-button class="border-0" @click="onEditClients(details,tabName)"><i
                      class="material-icons"
                    >edit</i></b-button>
                    <b-button class="border-0" @click="onDeleteClients(details,tabName)"><i
                      class="material-icons"
                    >delete</i></b-button>
                  </div>
                </div>
              </app-card>
            </div>
          </template>
        </div>
      </b-tab>
      <div v-for="(details,tabName,index) in clientData" :key="index">
        <b-tab :key="index" :title="$t('message.'+tabName)">
          <div class="row">
            <div
              v-for="(details,keyy,index) in clientData[tabName]"
              :key="index"
              class="mb-30 col-12 col-sm-6 col-md-4 col-lg-3"
            >
              <app-card custom-classes="mb-0 client-item">
                <div class="text-center position-relative">
                  <div class="thumb-wrap mb-3 ">
                    <img :src="details.image" class="rounded-lg">
                  </div>
                  <div class="client-content">
                    <h4 class="mb-2 text-primary">{{ details.name }}</h4>
                    <div class="contact-links text-truncate mb-1 fs-14">
                      <a class="" href="javascript:void(0)">{{ details.e_mail }}</a>
                    </div>
                    <div class="contact-links fs-14 text-truncate mb-1">
                      <a class="" href="javascript:void(0)">{{ details.phone_number }}</a>
                    </div>
                    <div class="fs-14 text-truncate mb-1">{{ details.country }}</div>
                  </div>
                  <div class="action-btn-wrap">
                    <b-button class="border-0" @click="onEditClients(details,tabName)"><i
                      class="material-icons"
                    >edit</i>
                    </b-button>
                    <b-button class="border-0" @click="onDeleteClients(details,tabName)"><i
                      class="material-icons"
                    >delete</i></b-button>
                  </div>
                </div>
              </app-card>
            </div>
          </div>
        </b-tab>
      </div>
    </b-tabs>
    <delete-confirmation-dialog
      ref="deleteConfirmationDialog"
      message="Are you sure you want to delete this Client permanently?"
      @onConfirm="deleteClientItem"
    />
    <template>
      <div class="editConfirmationDialog">
        <b-modal v-model="open" max-width="500" hide-footer centered title="Edit User">
          <div class="d-block pa-1">
            <b-form @submit.stop.prevent="editClientItem">
              <b-form-group id="input-group-1" label="Name" label-for="name">
                <b-form-input
                  id="name"
                  v-model="$v.form.editName.$model"
                  class="mb-3"
                  :state="$v.form.editName.$dirty ? !$v.form.editName.$error : null"
                  placeholder="Name"
                />
                <b-form-invalid-feedback>
                  {{ message }}
                </b-form-invalid-feedback>
              </b-form-group>
              <b-form-group id="input-group-2" label="Email" label-for="email">
                <b-form-input
                  id="email"
                  v-model="$v.form.editEmail.$model"
                  class="mb-3"
                  :state="$v.form.editEmail.$dirty ? !$v.form.editEmail.$error : null"
                  placeholder="Email"
                />
                <b-form-invalid-feedback>
                  E-mail must be valid
                </b-form-invalid-feedback>
              </b-form-group>
              <b-form-group id="input-group-3" label="Phone Number" label-for="phone-no">
                <b-form-input
                  id="phone-no"
                  v-model="$v.form.editPhoneNo.$model"
                  class="mb-3"
                  :state="$v.form.editPhoneNo.$dirty ? !$v.form.editPhoneNo.$error : null"
                  placeholder="Phone Number"
                />
                <b-form-invalid-feedback>
                  {{ message }}
                </b-form-invalid-feedback>
              </b-form-group>
              <b-form-group id="input-group-4" label="Location" label-for="location">
                <b-form-input
                  id="location"
                  v-model="$v.form.editLocation.$model"
                  class="mb-3"
                  :state="$v.form.editLocation.$dirty ? !$v.form.editLocation.$error : null"
                  placeholder="Location"
                />
                <b-form-invalid-feedback>
                  {{ message }}
                </b-form-invalid-feedback>
              </b-form-group>
              <div class="d-flex justify-content-end">
                <b-btn class="mt-3 text-capitalize mx-2" variant="primary" size="sm" @click="open = false">
                  Cancel
                </b-btn>
                <b-btn
                  type="submit"
                  :disabled="$v.form.$invalid"
                  class="mt-3 text-capitalize mx-2 px-4"
                  variant="danger"
                  size="sm"
                >
                  Update
                </b-btn>
              </div>
            </b-form>
          </div>
        </b-modal>
      </div>
    </template>
  </div>
</template>

<script>
import { clientData } from 'Assets/data/clientData.js'
import { validationMixin } from 'vuelidate'
import { required, email } from 'vuelidate/lib/validators'

export default {
  data() {
    return {
      clientData,
      selectItemToDelete: null,
      selectedTabName: null,
      selectItemToEdit: null,
      open: false,
      form: {
        editName: null,
        editEmail: null,
        editPhoneNo: null,
        editLocation: null
      },
      message: 'Field should not be empty'
    }
  },
  validations: {
    form: {
      editName: {
        required
      },
      editEmail: {
        required, email
      },
      editPhoneNo: {
        required
      },
      editLocation: {
        required
      }
    }
  },
  methods: {
    onDeleteClients(item, tabName) {
      this.$refs.deleteConfirmationDialog.openDialog()
      this.selectItemToDelete = item
      this.selectedTabName = tabName
    },
    deleteClientItem() {
      this.$refs.deleteConfirmationDialog.close()
      const deletedClient = this.clientData
      const index = deletedClient[this.selectedTabName].indexOf(this.selectItemToDelete)
      deletedClient[this.selectedTabName].splice(index, 1)
    },
    onEditClients(item, tabName) {
      this.openDialog()
      this.form.editName = item.name
      this.form.editEmail = item.e_mail
      this.form.editPhoneNo = item.phone_number
      this.form.editLocation = item.country
      this.selectItemToEdit = item
      this.selectedTabName = tabName
    },
    editClientItem() {
      const editClient = this.clientData
      const index = editClient[this.selectedTabName].indexOf(this.selectItemToEdit)
      editClient[this.selectedTabName][index].name = this.form.editName
      editClient[this.selectedTabName][index].e_mail = this.form.editEmail
      editClient[this.selectedTabName][index].phone_number = this.form.editPhoneNo
      editClient[this.selectedTabName][index].country = this.form.editLocation
      this.close()
    },
    openDialog() {
      this.open = true
    },
    close() {
      this.open = false
    }
  }
}
</script>
