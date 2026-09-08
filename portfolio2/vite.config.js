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
    origin: 'https://importio.ddev.site:5174',
    allowedHosts: ['importio.ddev.site', 'ddev-importio-web'],

    hmr: {
      host: 'importio.ddev.site',
      protocol: 'wss'
    },
  },

  build: {
    outDir: 'dist',
    manifest: true,
    emptyOutDir: true,

    rollupOptions: {
      input: './assets/js/app.js',
    },
  },
})