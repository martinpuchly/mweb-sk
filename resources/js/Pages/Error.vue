<template>
    <AppLayout>
      <H1>{{ title }}</H1>
      <div class="row">
        <div v-html="description" class="fs-4 col-6"></div>
        <div class="col-6">
          <img v-if="image" :src="image" :alt="title" class="image-fluid" style="width: 80%">
          <img v-else src="/images/error.png" :alt="title" class="image-fluid" style="width: 100%">
        </div>
      </div>
    </AppLayout>
  </template>
  
  <script>
import AppLayout from '@/Layouts/AppLayout.vue'

  export default {
    props: {
      status: Number,
    },
    components:{
      AppLayout
    },
    computed: {
      title() {
        return {
          503: '503: Service Unavailable',
          500: '500: Server Error',
          404: '404: Stránka sa nenašla.',
          403: '403: Nemáte prístup',
        }[this.status]
      },
      description() {
        return {
          503: 'Sorry, we are doing some maintenance. Please check back soon.',
          500: 'Whoops, something went wrong on our servers.',
          404: 'Požadovaná stránka sa na webe nenachádza.',
          403: '<span style="font-weight:bold; color: red">Do tejto časti stránky nemáte prístup.</span>',
        }[this.status]
      },
      image() {
        return {
          503: false,
          500: false,
          404: false,
          403: '/images/stop_hand.png',
        }[this.status]
      },
    },
  }
  </script>