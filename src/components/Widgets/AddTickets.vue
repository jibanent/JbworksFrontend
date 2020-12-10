<template>
  <div>
    <div class="table-responsive">
      <table class="table table-striped custom-table">
        <thead>
          <tr>
            <th v-for="(header,index) in headers" :key="index">
              {{ header.text }}
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="row in addTicketsDetails" :key="row.id">
            <td>{{ row.id }}</td>
            <td class="fw-semi-bold">{{ row.ticketsCode }}</td>
            <td>{{ row.subject }}</td>
            <td>{{ row.date }}</td>
            <td>{{ row.department }}</td>
            <td>
              <b-badge :variant="row.statusColor">{{ row.status }}</b-badge>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import { addTicketsDetails } from 'Assets/data/addTicketsDetails.js'

export default {
  data() {
    return {
      headers: [
        {
          text: 'Sr.No',
          sortable: false,
          value: 'Sr.No'
        },
        {
          text: 'Tickets Code',
          sortable: false,
          value: 'Tickets Code'
        },
        {
          text: 'Subject',
          sortable: false,
          value: 'Subject'
        },
        {
          text: 'Date',
          sortable: false,
          value: 'Date'
        },
        {
          text: 'Department',
          sortable: false,
          value: 'Department'
        },
        {
          text: 'Status',
          sortable: false,
          value: 'Status'
        }
      ],
      addTicketsDetails
    }
  }
}
</script>
