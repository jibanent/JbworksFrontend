<template>
  <div>
    <b-table responsive striped hover :fields="fields" :items="items">
      <template v-slot:cell(name)="data">
        <a :href="'/crm/projectDetails/'+ data.item.id">{{ data.item.name }}</a>
      </template>
      <template v-slot:cell(team)="data">
        <img
          v-for="(img,index) in data.item.teamImage"
          :key="index"
          width="30px"
          height="30px"
          class="rounded-circle"
          :src="img"
        >
      </template>
    </b-table>
  </div>
</template>

<script>

export default {
  props: ['projectDetails'],
  data() {
    return {
      fields: [
        'id',
        'name',
        'budget',
        'duration',
        'client',
        'team',
        'status',
        'deadline'
      ],
      items: []
    }
  },
  mounted() {
    this.getData()
  },
  methods: {
    getData() {
      for (var i = 0; i < this.projectDetails.length; i++) {
        this.item =
						{
						  id: this.projectDetails[i].id,
						  name: this.projectDetails[i].name,
						  budget: this.projectDetails[i].budget,
						  duration: this.projectDetails[i].duration,
						  client: this.projectDetails[i].client,
						  teamImage: this.projectDetails[i].teamImage,
						  status: this.projectDetails[i].status,
						  deadline: this.projectDetails[i].deadline,
						  statusColor: this.projectDetails[i].statusColor
						}
        this.items.push(this.item)
      }
    }
  }
}
</script>
