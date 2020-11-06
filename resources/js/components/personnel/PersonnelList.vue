<template>
  <div>
    <table class="table table-bordered">
      <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date Hired</th>
        <th>Position</th>
        <th>Department</th>
        <th>Actions</th>
      </tr>
      </thead>
      <tbody v-for="person in people">

      <tr>
        <td>{{ person.id }}</td>
        <td>{{ person.fullName }}</td>
        <td>{{ person.dateHired }}</td>
        <td>{{ person.position }}</td>
        <td>{{ person.department }}</td>
        <td>Edit</td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: 'personnel-list',

  data: () => ({
    people: null,
  }),

  methods: {

  },

  mounted() {
    axios
      .get('/api/personnels')
      .then(response => (this.people = response.data.data))
  }

}
</script>

<style>

</style>
