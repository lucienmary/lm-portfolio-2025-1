import { defineConfig } from "vite";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
  root: process.cwd(),
  base: "/",
  build: {
    outDir: "public/dist",
    emptyOutDir: true,
    rollupOptions: {
      input: {
        main: "src/main.js",
      },
    },
  },
  plugins: [tailwindcss()],
  server: {
    port: 5173,
    strictPort: true,
    hmr: {
      protocol: 'ws',
      host: 'localhost',
      port: 5173,
    },
    proxy: {
      // les requêtes API ou pages => PHP
      '^/(.+)\\.php$': {
        target: "http://127.0.0.1:8000",
        changeOrigin: true,
        secure: false,
      },
    },
  },
});
