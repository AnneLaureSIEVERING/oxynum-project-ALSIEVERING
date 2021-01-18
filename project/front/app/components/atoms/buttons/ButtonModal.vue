<template>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
    <button type="button" class="btn btn-primary" v-on:click="update">Modifier</button>
  </div>
</template>

<script>
export default {
  name: "ButtonModal"
}
</script>