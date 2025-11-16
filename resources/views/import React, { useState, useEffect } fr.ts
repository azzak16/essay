import React, { useState, useEffect } from 'react';
import { ChevronLeft, ChevronRight, Mail, Phone, MapPin, Users, Target, Eye, Award, Briefcase, Calendar, Facebook, Instagram, Linkedin, Twitter, Menu, X } from 'lucide-react';

export default function CompanyProfile() {
  const [currentSlide, setCurrentSlide] = useState(0);
  const [activeSection, setActiveSection] = useState('home');
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);

  const companyData = {
    name: "PT Teknologi Nusantara",
    tagline: "Innovating Indonesia's Digital Future",
    email: "info@teknusantara.com",
    phone: "+62 31 1234 5678",
    address: "Jl. Raya Darmo No. 123, Surabaya, Jawa Timur 60264",
    founded: "2015",

    heroSlides: [
      {
        image: "https://images.unsplash.com/photo-1497366216548-37526070297c?w=1200",
        title: "Transformasi Digital Untuk Indonesia",
        subtitle: "Solusi teknologi terdepan untuk bisnis modern"
      },
      {
        image: "https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1200",
        title: "Tim Profesional & Berpengalaman",
        subtitle: "Lebih dari 100 project berhasil diselesaikan"
      },
      {
        image: "https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=1200",
        title: "Inovasi Tanpa Batas",
        subtitle: "Menciptakan solusi untuk masa depan yang lebih baik"
      }
    ],

    about: {
      description: "PT Teknologi Nusantara adalah perusahaan teknologi informasi terkemuka yang berdedikasi untuk membawa transformasi digital ke seluruh Indonesia. Dengan pengalaman lebih dari 8 tahun, kami telah melayani ratusan klien dari berbagai industri, mulai dari startup hingga perusahaan multinasional.",
      stats: [
        { number: "8+", label: "Tahun Pengalaman" },
        { number: "200+", label: "Proyek Selesai" },
        { number: "150+", label: "Klien Puas" },
        { number: "50+", label: "Tim Profesional" }
      ]
    },

    visionMission: {
      vision: "Menjadi perusahaan teknologi terdepan di Indonesia yang memberikan solusi inovatif dan berkelanjutan untuk mendorong transformasi digital nasional.",
      mission: [
        "Mengembangkan produk dan layanan teknologi berkualitas tinggi yang sesuai dengan kebutuhan pasar lokal",
        "Memberdayakan talenta digital Indonesia melalui pelatihan dan pengembangan berkelanjutan",
        "Membangun ekosistem digital yang inklusif dan dapat diakses oleh semua kalangan",
        "Menjalin kemitraan strategis dengan berbagai stakeholder untuk mempercepat adopsi teknologi",
        "Berkontribusi pada pertumbuhan ekonomi digital Indonesia secara berkelanjutan"
      ]
    },

    services: [
      {
        icon: "💻",
        title: "Software Development",
        description: "Pengembangan aplikasi web dan mobile custom sesuai kebutuhan bisnis Anda"
      },
      {
        icon: "☁️",
        title: "Cloud Solutions",
        description: "Migrasi dan manajemen infrastruktur cloud untuk skalabilitas optimal"
      },
      {
        icon: "🎨",
        title: "UI/UX Design",
        description: "Desain antarmuka yang menarik dan pengalaman pengguna yang intuitif"
      },
      {
        icon: "📊",
        title: "Data Analytics",
        description: "Analisis data mendalam untuk insight bisnis yang actionable"
      },
      {
        icon: "🔒",
        title: "Cybersecurity",
        description: "Solusi keamanan komprehensif untuk melindungi aset digital Anda"
      },
      {
        icon: "🤖",
        title: "AI & Machine Learning",
        description: "Implementasi kecerdasan buatan untuk otomasi dan efisiensi bisnis"
      }
    ],

    activities: [
      {
        title: "Workshop Teknologi AI",
        date: "15 Oktober 2024",
        image: "https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600",
        description: "Pelatihan implementasi AI untuk 50+ peserta dari berbagai industri"
      },
      {
        title: "Tech Conference 2024",
        date: "22 September 2024",
        image: "https://images.unsplash.com/photo-1505373877841-8d25f7d46678?w=600",
        description: "Konferensi teknologi nasional dengan 500+ peserta"
      },
      {
        title: "CSR - Donasi Komputer",
        date: "5 Agustus 2024",
        image: "https://images.unsplash.com/photo-1509062522246-3755977927d7?w=600",
        description: "Donasi 20 unit komputer untuk sekolah di daerah terpencil"
      },
      {
        title: "Team Building Event",
        date: "18 Juli 2024",
        image: "https://images.unsplash.com/photo-1511578314322-379afb476865?w=600",
        description: "Kegiatan team building untuk meningkatkan solidaritas tim"
      },
      {
        title: "Hackathon Innovation",
        date: "10 Juni 2024",
        image: "https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600",
        description: "Kompetisi pengembangan aplikasi dengan hadiah total 50 juta"
      },
      {
        title: "Webinar Digital Marketing",
        date: "25 Mei 2024",
        image: "https://images.unsplash.com/photo-1557804506-669a67965ba0?w=600",
        description: "Seri webinar gratis tentang strategi digital marketing modern"
      }
    ],

    organization: {
      ceo: {
        name: "Budi Santoso",
        position: "CEO & Founder",
        image: "https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400",
        bio: "Visioner dengan 15+ tahun pengalaman di industri teknologi"
      },
      leadership: [
        {
          name: "Andi Wijaya",
          position: "CTO",
          image: "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400",
          bio: "Expert dalam arsitektur sistem dan cloud computing"
        },
        {
          name: "Siti Nurhaliza",
          position: "CFO",
          image: "https://images.unsplash.com/photo-1580489944761-15a19d654956?w=400",
          bio: "Spesialis keuangan korporat dan strategic planning"
        },
        {
          name: "Rudi Hartono",
          position: "Head of Engineering",
          image: "https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=400",
          bio: "Memimpin tim developer dengan track record luar biasa"
        },
        {
          name: "Maya Putri",
          position: "Head of Design",
          image: "https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400",
          bio: "Creative director dengan passion untuk user experience"
        },
        {
          name: "Agus Setiawan",
          position: "Head of Sales",
          image: "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400",
          bio: "Sales strategist dengan network luas di industri"
        },
        {
          name: "Dewi Lestari",
          position: "Head of HR",
          image: "https://images.unsplash.com/photo-1594744803329-e58b31de8bf5?w=400",
          bio: "HR professional fokus pada employee development"
        }
      ]
    },

    clients: [
      { name: "Bank Nusantara", logo: "🏦" },
      { name: "Retail Group", logo: "🛒" },
      { name: "Telco Indonesia", logo: "📱" },
      { name: "Healthcare Plus", logo: "🏥" },
      { name: "Edu Tech", logo: "📚" },
      { name: "Logistics Pro", logo: "🚚" }
    ],

    socialMedia: {
      facebook: "teknusantara",
      instagram: "teknusantara",
      linkedin: "pt-teknologi-nusantara",
      twitter: "teknusantara"
    }
  };

  useEffect(() => {
    const timer = setInterval(() => {
      setCurrentSlide((prev) => (prev + 1) % companyData.heroSlides.length);
    }, 5000);
    return () => clearInterval(timer);
  }, []);

  const nextSlide = () => {
    setCurrentSlide((prev) => (prev + 1) % companyData.heroSlides.length);
  };

  const prevSlide = () => {
    setCurrentSlide((prev) => (prev - 1 + companyData.heroSlides.length) % companyData.heroSlides.length);
  };

  const scrollToSection = (section) => {
    setActiveSection(section);
    setMobileMenuOpen(false);
    document.getElementById(section)?.scrollIntoView({ behavior: 'smooth' });
  };

  return (
    <div className="min-h-screen bg-slate-50">
      {/* Navigation */}
      <nav className="fixed top-0 w-full bg-white/95 backdrop-blur-sm shadow-md z-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex justify-between items-center h-16">
            <div className="flex items-center">
              <div className="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                {companyData.name}
              </div>
            </div>

            {/* Desktop Menu */}
            <div className="hidden md:flex space-x-8">
              {['home', 'about', 'services', 'activities', 'team', 'contact'].map((item) => (
                <button
                  key={item}
                  onClick={() => scrollToSection(item)}
                  className={`${
                    activeSection === item ? 'text-blue-600' : 'text-gray-700'
                  } hover:text-blue-600 font-medium transition capitalize`}
                >
                  {item === 'home' ? 'Beranda' : item === 'about' ? 'Tentang' : item === 'services' ? 'Layanan' : item === 'activities' ? 'Kegiatan' : item === 'team' ? 'Tim' : 'Kontak'}
                </button>
              ))}
            </div>

            {/* Mobile Menu Button */}
            <button
              className="md:hidden"
              onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
            >
              {mobileMenuOpen ? <X size={24} /> : <Menu size={24} />}
            </button>
          </div>
        </div>

        {/* Mobile Menu */}
        {mobileMenuOpen && (
          <div className="md:hidden bg-white border-t">
            <div className="px-2 pt-2 pb-3 space-y-1">
              {['home', 'about', 'services', 'activities', 'team', 'contact'].map((item) => (
                <button
                  key={item}
                  onClick={() => scrollToSection(item)}
                  className="block w-full text-left px-3 py-2 text-gray-700 hover:bg-gray-100 rounded capitalize"
                >
                  {item === 'home' ? 'Beranda' : item === 'about' ? 'Tentang' : item === 'services' ? 'Layanan' : item === 'activities' ? 'Kegiatan' : item === 'team' ? 'Tim' : 'Kontak'}
                </button>
              ))}
            </div>
          </div>
        )}
      </nav>

      {/* Hero Slider */}
      <section id="home" className="relative h-screen mt-16">
        <div className="absolute inset-0 overflow-hidden">
          {companyData.heroSlides.map((slide, index) => (
            <div
              key={index}
              className={`absolute inset-0 transition-opacity duration-1000 ${
                index === currentSlide ? 'opacity-100' : 'opacity-0'
              }`}
            >
              <img
                src={slide.image}
                alt={slide.title}
                className="w-full h-full object-cover"
              />
              <div className="absolute inset-0 bg-gradient-to-r from-black/70 to-black/50" />
            </div>
          ))}
        </div>

        <div className="relative h-full flex items-center justify-center text-center px-4">
          <div className="max-w-4xl">
            <h1 className="text-5xl md:text-7xl font-bold text-white mb-6 animate-fade-in">
              {companyData.heroSlides[currentSlide].title}
            </h1>
            <p className="text-xl md:text-2xl text-gray-200 mb-8">
              {companyData.heroSlides[currentSlide].subtitle}
            </p>
            <div className="flex gap-4 justify-center">
              <button
                onClick={() => scrollToSection('about')}
                className="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-full font-semibold transition"
              >
                Pelajari Lebih Lanjut
              </button>
              <button
                onClick={() => scrollToSection('contact')}
                className="px-8 py-3 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white rounded-full font-semibold transition"
              >
                Hubungi Kami
              </button>
            </div>
          </div>
        </div>

        {/* Slider Controls */}
        <button
          onClick={prevSlide}
          className="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-full flex items-center justify-center text-white transition"
        >
          <ChevronLeft size={24} />
        </button>
        <button
          onClick={nextSlide}
          className="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-full flex items-center justify-center text-white transition"
        >
          <ChevronRight size={24} />
        </button>

        {/* Slide Indicators */}
        <div className="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-2">
          {companyData.heroSlides.map((_, index) => (
            <button
              key={index}
              onClick={() => setCurrentSlide(index)}
              className={`w-3 h-3 rounded-full transition ${
                index === currentSlide ? 'bg-white w-8' : 'bg-white/50'
              }`}
            />
          ))}
        </div>
      </section>

      {/* About Section */}
      <section id="about" className="py-20 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-16">
            <h2 className="text-4xl font-bold text-gray-900 mb-4">Tentang Kami</h2>
            <div className="w-20 h-1 bg-blue-600 mx-auto"></div>
          </div>

          <div className="grid md:grid-cols-2 gap-12 items-center mb-16">
            <div>
              <p className="text-lg text-gray-700 leading-relaxed mb-6">
                {companyData.about.description}
              </p>
              <p className="text-gray-600">
                Kami percaya bahwa teknologi adalah kunci untuk membuka potensi penuh dari setiap bisnis. Dengan tim yang berdedikasi dan metodologi yang terbukti, kami siap menjadi partner terpercaya dalam perjalanan digital transformation Anda.
              </p>
            </div>
            <div className="grid grid-cols-2 gap-6">
              {companyData.about.stats.map((stat, index) => (
                <div key={index} className="bg-gradient-to-br from-blue-50 to-purple-50 p-6 rounded-2xl text-center">
                  <div className="text-4xl font-bold text-blue-600 mb-2">{stat.number}</div>
                  <div className="text-gray-700 font-medium">{stat.label}</div>
                </div>
              ))}
            </div>
          </div>

          {/* Vision & Mission */}
          <div className="grid md:grid-cols-2 gap-8">
            <div className="bg-gradient-to-br from-blue-500 to-blue-600 p-8 rounded-3xl text-white">
              <div className="flex items-center gap-3 mb-4">
                <Eye size={32} />
                <h3 className="text-2xl font-bold">Visi</h3>
              </div>
              <p className="text-blue-50 leading-relaxed">{companyData.visionMission.vision}</p>
            </div>
            <div className="bg-gradient-to-br from-purple-500 to-purple-600 p-8 rounded-3xl text-white">
              <div className="flex items-center gap-3 mb-4">
                <Target size={32} />
                <h3 className="text-2xl font-bold">Misi</h3>
              </div>
              <ul className="space-y-2 text-purple-50">
                {companyData.visionMission.mission.map((item, index) => (
                  <li key={index} className="flex items-start gap-2">
                    <span className="text-white mt-1">•</span>
                    <span>{item}</span>
                  </li>
                ))}
              </ul>
            </div>
          </div>
        </div>
      </section>

      {/* Services Section */}
      <section id="services" className="py-20 bg-gray-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-16">
            <h2 className="text-4xl font-bold text-gray-900 mb-4">Layanan Kami</h2>
            <div className="w-20 h-1 bg-blue-600 mx-auto mb-4"></div>
            <p className="text-gray-600 max-w-2xl mx-auto">
              Solusi teknologi komprehensif untuk mendukung pertumbuhan bisnis Anda
            </p>
          </div>

          <div className="grid md:grid-cols-3 gap-8">
            {companyData.services.map((service, index) => (
              <div
                key={index}
                className="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition group"
              >
                <div className="text-5xl mb-4 group-hover:scale-110 transition">{service.icon}</div>
                <h3 className="text-xl font-bold text-gray-900 mb-3">{service.title}</h3>
                <p className="text-gray-600">{service.description}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Activities Section */}
      <section id="activities" className="py-20 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-16">
            <h2 className="text-4xl font-bold text-gray-900 mb-4">Kegiatan Kami</h2>
            <div className="w-20 h-1 bg-blue-600 mx-auto mb-4"></div>
            <p className="text-gray-600 max-w-2xl mx-auto">
              Berbagai aktivitas dan program yang kami laksanakan
            </p>
          </div>

          <div className="grid md:grid-cols-3 gap-8">
            {companyData.activities.map((activity, index) => (
              <div
                key={index}
                className="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition"
              >
                <img
                  src={activity.image}
                  alt={activity.title}
                  className="w-full h-48 object-cover"
                />
                <div className="p-6">
                  <div className="flex items-center gap-2 text-sm text-blue-600 mb-2">
                    <Calendar size={16} />
                    <span>{activity.date}</span>
                  </div>
                  <h3 className="text-xl font-bold text-gray-900 mb-3">{activity.title}</h3>
                  <p className="text-gray-600">{activity.description}</p>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Team Section */}
      <section id="team" className="py-20 bg-gray-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-16">
            <h2 className="text-4xl font-bold text-gray-900 mb-4">Tim Kami</h2>
            <div className="w-20 h-1 bg-blue-600 mx-auto mb-4"></div>
            <p className="text-gray-600 max-w-2xl mx-auto">
              Berkenalan dengan para pemimpin yang membawa visi perusahaan menjadi kenyataan
            </p>
          </div>

          {/* CEO */}
          <div className="max-w-4xl mx-auto mb-16">
            <div className="bg-gradient-to-r from-blue-600 to-purple-600 p-1 rounded-3xl">
              <div className="bg-white rounded-3xl p-8">
                <div className="flex flex-col md:flex-row items-center gap-8">
                  <img
                    src={companyData.organization.ceo.image}
                    alt={companyData.organization.ceo.name}
                    className="w-40 h-40 rounded-full object-cover"
                  />
                  <div className="text-center md:text-left">
                    <h3 className="text-3xl font-bold text-gray-900 mb-2">
                      {companyData.organization.ceo.name}
                    </h3>
                    <p className="text-xl text-blue-600 font-semibold mb-3">
                      {companyData.organization.ceo.position}
                    </p>
                    <p className="text-gray-600">{companyData.organization.ceo.bio}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          {/* Leadership Team */}
          <div className="grid md:grid-cols-3 gap-8">
            {companyData.organization.leadership.map((member, index) => (
              <div
                key={index}
                className="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition"
              >
                <img
                  src={member.image}
                  alt={member.name}
                  className="w-full h-64 object-cover"
                />
                <div className="p-6">
                  <h3 className="text-xl font-bold text-gray-900 mb-2">{member.name}</h3>
                  <p className="text-blue-600 font-semibold mb-3">{member.position}</p>
                  <p className="text-gray-600 text-sm">{member.bio}</p>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Clients Section */}
      <section className="py-20 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-16">
            <h2 className="text-4xl font-bold text-gray-900 mb-4">Klien Kami</h2>
            <div className="w-20 h-1 bg-blue-600 mx-auto mb-4"></div>
            <p className="text-gray-600 max-w-2xl mx-auto">
              Dipercaya oleh perusahaan terkemuka di Indonesia
            </p>
          </div>

          <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
            {companyData.clients.map((client, index) => (
              <div
                key={index}
                className="flex flex-col items-center justify-center p-6 bg-gray-50 rounded-xl hover:bg-gray-100 transition"
              >
                <div className="text-5xl mb-3">{client.logo}</div>
                <p className="text-sm font-semibold text-gray-700 text-center">{client.name}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Contact Section */}
      <section id="contact" className="py-20 bg-gradient-to-br from-blue-600 to-purple-600">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-16">
            <h2 className="text-4xl font-bold text-white mb-4">Hubungi Kami</h2>
            <div className="w-20 h-1 bg-white mx-auto mb-4"></div>
            <p className="text-blue-100 max-w-2xl mx-auto">
              Mari diskusikan bagaimana kami dapat membantu transformasi digital bisnis Anda
            </p>
          </div>

          <div className="grid md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            <div className="bg-white/10 backdrop-blur-sm p-8 rounded-2xl text-center">
              <div className="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                <Phone className="text-white" size={28} />
              </div>
              <h3 className="text-xl font-bold text-white mb-2">Telepon</h3>
              <p className="text-blue-100">{companyData.phone}</p>
            </div>

            <div className="bg-white/10 backdrop-blur-sm p-8 rounded-2xl text-center">
              <div className="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                <Mail className="text-white" size={28} />
              </div>
              <h3 className="text-xl font-bold text-white mb-2">Email</h3>
              <p className="text-blue-100">{companyData.email}</p>
            </div>

            <div className="bg-white/10 backdrop-blur-sm p-8 rounded-2xl text-center">
              <div className="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                <MapPin className="text-white" size={28} />
              </div>
              <h3 className="text-xl font-bold text-white mb-2">Alamat</h3>
              <p className="text-blue-100">{companyData.address}</p>
            </div>
          </div>

          <div className="flex justify-center gap-6 mt-12">
            <a
              href={`https://facebook.com/${companyData.socialMedia.facebook}`}
              className="w-12 h-12 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center text-white transition"
            >
              <Facebook size={24} />
            </a>
            <a
              href={`https://instagram.com/${companyData.socialMedia.instagram}`}
              className="w-12 h-12 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center text-white transition"
            >
              <Instagram size={24} />
            </a>
            <a
              href={`https://linkedin.com/company/${companyData.socialMedia.linkedin}`}
              className="w-12 h-12 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center text-white transition"
            >
              <Linkedin size={24} />
            </a>
            <a
              href={`https://twitter.com/${companyData.socialMedia.twitter}`}
              className="w-12 h-12 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center text-white transition"
            >
              <Twitter size={24} />
            </a>
          </div>
        </div>
      </section>

      {/* Footer */}
      <footer className="bg-gray-900 text-gray-300 py-12">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid md:grid-cols-4 gap-8 mb-8">
            <div>
              <h3 className="text-2xl font-bold text-white mb-4">{companyData.name}</h3>
              <p className="text-sm mb-4">{companyData.tagline}</p>
              <p className="text-sm">Didirikan tahun {companyData.founded}</p>
            </div>
            <div>
              <h4 className="text-white font-semibold mb-4">Link Cepat</h4>
              <div className="space-y-2">
                <button onClick={() => scrollToSection('about')} className="block hover:text-white transition">Tentang Kami</button>
                <button onClick={() => scrollToSection('services')} className="block hover:text-white transition">Layanan</button>
                <button onClick={() => scrollToSection('activities')} className="block hover:text-white transition">Kegiatan</button>
                <button onClick={() => scrollToSection('team')} className="block hover:text-white transition">Tim</button>
              </div>
            </div>
            <div>
              <h4 className="text-white font-semibold mb-4">Layanan</h4>
              <div className="space-y-2 text-sm">
                <p>Software Development</p>
                <p>Cloud Solutions</p>
                <p>UI/UX Design</p>
                <p>Data Analytics</p>
              </div>
            </div>
            <div>
              <h4 className="text-white font-semibold mb-4">Kontak</h4>
              <div className="space-y-2 text-sm">
                <p>{companyData.phone}</p>
                <p>{companyData.email}</p>
                <p className="text-xs">{companyData.address}</p>
              </div>
            </div>
          </div>
          <div className="border-t border-gray-800 pt-8 text-center text-sm">
            <p>© 2024 {companyData.name}. All rights reserved.</p>
          </div>
        </div>
      </footer>
    </div>
  );
}
