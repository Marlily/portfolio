import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
  plugins: [tailwindcss()],
  base: './',

  server: {
    host: '0.0.0.0',
    port: 5174,
    cors: true,
    strictPort: true,
    origin: 'https://qort-ta.ddev.site:5174',

    hmr: {
      host: 'qort-ta.ddev.site',
      protocol: 'wss',
      port: 5174,
    },

    watch: {
      usePolling: true,
    },
  },

  build: {
    outDir: 'dist',
    manifest: true,
    emptyOutDir: true,

    rollupOptions: {
      input: {
        app: './assets/js/app.js',
        nav: './assets/js/nav.js',
      },
    },
  },
})
