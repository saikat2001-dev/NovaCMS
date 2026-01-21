<x-layout>
    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <!-- Background Decoration -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full z-0 pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-primary rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
            <div class="absolute top-20 right-10 w-72 h-72 bg-primary rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-1/2 w-72 h-72 bg-primary rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <span class="inline-block py-1 px-3 rounded-full bg-primary border border-primary text-white text-sm font-semibold mb-6 tracking-wide uppercase">
                v2.0 is now available
            </span>
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight text-text mb-8 leading-tight">
                Manage content with <br class="hidden md:block" />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-primary">Unmatched Speed</span>
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-xl text-secondary mb-10 leading-relaxed">
                A powerful, developer-friendly CMS that helps you build faster and scale easier. focus on your content, not the infrastructure.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#" class="px-8 py-4 rounded-full bg-primary text-white font-bold text-lg hover:bg-primary transition-all shadow-lg hover:shadow-primary/30 transform hover:-translate-y-1">
                    Start for Free
                </a>
                <a href="#" class="px-8 py-4 rounded-full bg-white text-text border border-border font-bold text-lg hover:bg-slate-50 transition-all shadow-sm hover:shadow-md">
                    View Demo
                </a>
            </div>
            
            <!-- Dashboard Preview -->
            <div class="mt-20 relative mx-auto max-w-5xl">
                <div class="rounded-xl bg-slate-900/5 p-2 ring-1 ring-inset ring-slate-900/10 lg:rounded-2xl lg:p-4">
                    <div class="rounded-md bg-white shadow-2xl ring-1 ring-slate-900/10 overflow-hidden">
                       <!-- Placeholder for a dashboard image via CSS/Divs to look like a UI -->
                       <div class="h-64 md:h-96 bg-background flex items-center justify-center">
                            <div class="text-center">
                                <div class="w-16 h-16 bg-indigo-100 text-primary rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                    </svg>
                                </div>
                                <p class="text-slate-400 font-medium">Interactive Dashboard Preview</p>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-base text-primary font-semibold tracking-wide uppercase">Features</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-text sm:text-4xl">
                    Everything you need to build amazing sites
                </p>
                <p class="mt-4 max-w-2xl text-xl text-secondary mx-auto">
                    Focus on creating great content while we handle the technical complexity.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Feature 1 -->
                <div class="relative group p-8 rounded-2xl bg-background border border-border hover:border-indigo-100 hover:shadow-xl hover:shadow-indigo-500/10 transition-all duration-300">
                    <div class="w-14 h-14 rounded-xl bg-white border border-indigo-100 flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition-transform">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-primary">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-text mb-3">Blazing Fast</h3>
                    <p class="text-secondary leading-relaxed">
                        Built for speed with optimized caching and lightweight assets to ensure your site loads instantly.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="relative group p-8 rounded-2xl bg-background border border-border hover:border-purple-100 hover:shadow-xl hover:shadow-purple-500/10 transition-all duration-300">
                   <div class="w-14 h-14 rounded-xl bg-white border border-purple-100 flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition-transform">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-purple-600">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-text mb-3">Secure by Default</h3>
                    <p class="text-secondary leading-relaxed">
                        Enterprise-grade security features out of the box. We take care of updates so you don't have to.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="relative group p-8 rounded-2xl bg-background border border-border hover:border-pink-100 hover:shadow-xl hover:shadow-pink-500/10 transition-all duration-300">
                    <div class="w-14 h-14 rounded-xl bg-white border border-pink-100 flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition-transform">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7 text-pink-600">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.794-.43l-2.53-2.515a.75.75 0 00-1.06 0l-9 9a.75.75 0 000 1.06l3 3a.75.75 0 001.06 0l9-9a.75.75 0 000-1.06l-2.515-2.53m-7.5-7.5h.008v.008H12v-.008z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-text mb-3">Developer Friendly</h3>
                    <p class="text-secondary leading-relaxed">
                        Robust API, clean documentation, and a community that loves building together.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-text">
         <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
             <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready to transform your content workflow?</h2>
             <p class="text-slate-300 text-lg mb-10 max-w-2xl mx-auto">
                 Join thousands of developers and content creators who trust {{config('app.name')}} for their digital presence.
             </p>
             <a href="#" class="inline-block px-8 py-4 rounded-full bg-white text-text font-bold text-lg hover:bg-indigo-50 transition-all transform hover:-translate-y-1">
                 Get Started Now
             </a>
         </div>
    </section>
</x-layout>
