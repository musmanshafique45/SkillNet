@extends('layouts.app')

@section('title', 'SkillNest – Learn Without Limits')

@push('styles')
<style>
    .hero-split { display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center }
    .courses-preview-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px }
    .how-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 32px }
    .how-card { text-align: center; padding: 40px 24px; background: var(--bg-card); border: 1px solid var(--border-light); border-radius: var(--radius-xl); position: relative; transition: var(--transition) }
    .how-card:hover { transform: translateY(-6px); border-color: var(--border) }
    .how-num { position: absolute; top: -16px; left: 50%; transform: translateX(-50%); width: 36px; height: 36px; background: linear-gradient(135deg, var(--primary), #A855F7); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: .85rem; font-weight: 800 }
    .how-icon { font-size: 2.8rem; margin-bottom: 16px }
    .testimonials-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px }
    .testimonial-card { background: var(--bg-card); border: 1px solid var(--border-light); border-radius: var(--radius-xl); padding: 28px; transition: var(--transition) }
    .testimonial-card:hover { transform: translateY(-4px); border-color: var(--border) }
    .testi-quote { font-size: 2rem; color: var(--primary); line-height: 1; margin-bottom: 12px }
    .testi-text { font-size: .92rem; color: var(--text-secondary); line-height: 1.7; margin-bottom: 20px }
    .testi-author { display: flex; align-items: center; gap: 12px }
    .testi-avatar { width: 42px; height: 42px; border-radius: 50%; background: linear-gradient(135deg, var(--primary), #A855F7); display: flex; align-items: center; justify-content: center; font-weight: 700 }
    .cta-section { padding: 100px 0; background: linear-gradient(135deg, rgba(99, 102, 241, .15) 0%, rgba(168, 85, 247, .1) 100%); border-top: 1px solid var(--border-light); border-bottom: 1px solid var(--border-light); text-align: center }
    .categories-strip { display: grid; grid-template-columns: repeat(6, 1fr); gap: 16px }
    .hero-mockup { background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-xl); padding: 24px; position: relative; animation: float 6s ease-in-out infinite }
    .mockup-course-item { display: flex; align-items: center; gap: 12px; padding: 12px; background: var(--bg-secondary); border-radius: var(--radius); margin-bottom: 8px }
    .mockup-thumb { width: 48px; height: 36px; border-radius: 6px; object-fit: cover; flex-shrink: 0 }
    .mockup-info h6 { font-size: .8rem; color: var(--text-primary); margin-bottom: 2px }
    .mockup-info p { font-size: .72rem; color: var(--text-secondary) }
    .badge-live { background: rgba(239, 68, 68, .15); color: var(--danger); border: 1px solid rgba(239, 68, 68, .3); padding: 3px 10px; border-radius: 100px; font-size: .7rem; font-weight: 700; animation: pulse-dot 2s infinite }

    @media(max-width:1024px) {
      .categories-strip { grid-template-columns: repeat(3, 1fr) }
      .how-grid, .testimonials-grid { grid-template-columns: 1fr 1fr }
      .courses-preview-grid { grid-template-columns: 1fr 1fr }
    }
    @media(max-width:768px) {
      .hero-split { grid-template-columns: 1fr }
      .how-grid, .testimonials-grid, .courses-preview-grid { grid-template-columns: 1fr }
      .categories-strip { grid-template-columns: repeat(2, 1fr) }
    }
</style>
@endpush

@section('content')
<!-- HERO -->
<section class="hero" id="home">
  <div class="hero-bg"></div>
  <div class="hero-orb hero-orb-1"></div>
  <div class="hero-orb hero-orb-2"></div>
  <div class="container hero-split">
    <div class="hero-content animate-fade-up">
      <div class="hero-eyebrow">
        <span class="dot"></span>
        #1 E-Learning Platform 2026
      </div>
      <h1>Learn Skills That <span class="gradient-text">Shape Your Future</span></h1>
      <p>Unlock your potential with expert-led courses in web development, design, data science, and more. Learn at your pace, earn certificates, and land your dream job.</p>
      <div class="hero-actions">
        <a href="{{ url('/courses') }}" class="btn btn-primary btn-lg">🚀 Explore Courses</a>
        <a href="{{ url('/register') }}" class="btn btn-outline btn-lg">Start Free Today</a>
      </div>
      <div class="hero-stats">
        <div class="hero-stat">
          <div class="num" data-count="12400" data-suffix="+">0</div>
          <div class="label">Active Students</div>
        </div>
        <div class="hero-divider"></div>
        <div class="hero-stat">
          <div class="num" data-count="240" data-suffix="+">0</div>
          <div class="label">Expert Courses</div>
        </div>
        <div class="hero-divider"></div>
        <div class="hero-stat">
          <div class="num" data-count="98" data-suffix="%">0</div>
          <div class="label">Satisfaction Rate</div>
        </div>
      </div>
    </div>
    <div class="hero-visual">
      <div class="hero-mockup">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px">
          <span style="font-size:.9rem;font-weight:700">Your Learning Dashboard</span>
          <span class="badge-live">● LIVE</span>
        </div>
        <div class="mockup-course-item">
          <img class="mockup-thumb" src="https://images.unsplash.com/photo-1593720213428-28a5b9e94613?w=200&q=80" alt="course" onerror="this.style.background='var(--primary)'">
          <div class="mockup-info">
            <h6>Web Development Bootcamp</h6>
            <p>62% complete</p>
          </div>
          <div style="margin-left:auto">
            <div class="progress-bar" style="width:80px">
              <div class="progress-fill" style="width:62%"></div>
            </div>
          </div>
        </div>
        <div class="mockup-course-item">
          <img class="mockup-thumb" src="https://images.unsplash.com/photo-1561070791-2526d30994b5?w=200&q=80" alt="course" onerror="this.style.background='var(--amber)'">
          <div class="mockup-info">
            <h6>UI/UX Design Mastery</h6>
            <p>100% complete ✅</p>
          </div>
          <div style="margin-left:auto">
            <div class="progress-bar" style="width:80px">
              <div class="progress-fill accent" style="width:100%"></div>
            </div>
          </div>
        </div>
        <div class="mockup-course-item">
          <img class="mockup-thumb" src="https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=200&q=80" alt="course" onerror="this.style.background='var(--accent)'">
          <div class="mockup-info">
            <h6>Python for Data Science</h6>
            <p>Just started</p>
          </div>
          <div style="margin-left:auto">
            <div class="progress-bar" style="width:80px">
              <div class="progress-fill amber" style="width:8%"></div>
            </div>
          </div>
        </div>
        <div style="margin-top:16px;padding:12px;background:rgba(99,102,241,.1);border:1px solid rgba(99,102,241,.2);border-radius:var(--radius);display:flex;align-items:center;gap:10px">
          <span>🏆</span>
          <div>
            <div style="font-size:.8rem;font-weight:700">Certificate Earned!</div>
            <div style="font-size:.72rem;color:var(--text-secondary)">UI/UX Design Mastery</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- STATS -->
<section class="section-sm" style="background:var(--bg-secondary);border-top:1px solid var(--border-light);border-bottom:1px solid var(--border-light)">
  <div class="container">
    <div class="stats-grid">
      <div class="stat-card animate-on-scroll">
        <div class="stat-icon" style="background:rgba(99,102,241,.12);color:var(--primary)">🎓</div>
        <div class="stat-num gradient-text" data-count="12400" data-suffix="+">0+</div>
        <div class="stat-label">Students Enrolled</div>
      </div>
      <div class="stat-card animate-on-scroll">
        <div class="stat-icon" style="background:rgba(16,185,129,.12);color:var(--accent)">📚</div>
        <div class="stat-num gradient-text" data-count="240" data-suffix="+">0+</div>
        <div class="stat-label">Expert Courses</div>
      </div>
      <div class="stat-card animate-on-scroll">
        <div class="stat-icon" style="background:rgba(245,158,11,.12);color:var(--amber)">👨‍🏫</div>
        <div class="stat-num gradient-text" data-count="85" data-suffix="+">0+</div>
        <div class="stat-label">Expert Instructors</div>
      </div>
      <div class="stat-card animate-on-scroll">
        <div class="stat-icon" style="background:rgba(168,85,247,.12);color:#A855F7">🏆</div>
        <div class="stat-num gradient-text" data-count="8900" data-suffix="+">0+</div>
        <div class="stat-label">Certificates Issued</div>
      </div>
    </div>
  </div>
</section>

<!-- CATEGORIES -->
<section class="section">
  <div class="container">
    <div class="section-header">
      <div class="eyebrow">Explore Categories</div>
      <h2>Find Your <span class="gradient-text">Learning Path</span></h2>
      <p>Choose from professionally curated categories designed to take you from beginner to job-ready.</p>
    </div>
    <div class="categories-strip">
        @foreach($categories as $cat)
        <div class="category-chip" onclick="window.location.href='{{ url('/courses?cat='.urlencode($cat['name'])) }}'">
            <div class="icon" style="background:{{ $cat['color'] }}22;color:{{ $cat['color'] }}">{{ $cat['icon'] }}</div>
            <div class="name">{{ $cat['name'] }}</div>
            <div class="count">{{ $cat['count'] }} courses</div>
        </div>
        @endforeach
    </div>
  </div>
</section>

<!-- FEATURED COURSES -->
<section class="section" style="background:var(--bg-secondary)">
  <div class="container">
    <div class="section-header">
      <div class="eyebrow">Featured Courses</div>
      <h2>Start Learning <span class="gradient-text">Today</span></h2>
      <p>Handpicked courses taught by industry experts, designed for real-world skills and career growth.</p>
    </div>
    <div class="courses-preview-grid">
        @foreach($featuredCourses as $course)
        <div class="course-card" onclick="window.location.href='{{ url('/courses/'.$course->id) }}'">
            <div class="course-thumb" style="background-image: url('{{ $course->thumbnail }}')">
                <span class="course-level level-{{ strtolower($course->level) }}">{{ $course->level }}</span>
            </div>
            <div class="course-content">
                <div class="course-meta">
                    <span class="course-cat">{{ $course->category }}</span>
                    <span class="course-rating">★ {{ $course->rating }} ({{ $course->students }})</span>
                </div>
                <h3 class="course-title">{{ $course->title }}</h3>
                <div class="course-footer">
                    <span class="course-price">{{ $course->price == 0 ? 'Free' : '$'.$course->price }}</span>
                    <button class="btn btn-primary btn-sm">Enroll Now</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div style="text-align:center;margin-top:40px">
      <a href="{{ url('/courses') }}" class="btn btn-outline btn-lg">View All Courses →</a>
    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="section">
  <div class="container">
    <div class="section-header">
      <div class="eyebrow">How It Works</div>
      <h2>Simple Steps to <span class="gradient-text">Success</span></h2>
    </div>
    <div class="how-grid">
      <div class="how-card animate-on-scroll">
        <div class="how-num">1</div>
        <div class="how-icon">📋</div>
        <h3>Create Account</h3>
        <p>Sign up for free and set up your learner profile in under 2 minutes. Choose your role — student or teacher.</p>
      </div>
      <div class="how-card animate-on-scroll">
        <div class="how-num">2</div>
        <div class="how-icon">🔍</div>
        <h3>Choose a Course</h3>
        <p>Browse hundreds of expert-led courses. Filter by category, level, and rating to find the perfect match.</p>
      </div>
      <div class="how-card animate-on-scroll">
        <div class="how-num">3</div>
        <div class="how-icon">🏆</div>
        <h3>Earn Certificate</h3>
        <p>Complete lectures, pass quizzes, and earn a verified certificate to showcase on your portfolio and LinkedIn.</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <div class="container">
    <div class="hero-eyebrow" style="margin:0 auto 24px">
      <span class="dot"></span>
      Join 12,000+ learners today
    </div>
    <h2>Ready to <span class="gradient-text">Transform Your Career?</span></h2>
    <p style="margin:16px auto 36px;max-width:500px;font-size:1.05rem">Start with free courses. No credit card required. Learn at your own pace, anytime, anywhere.</p>
    <div class="hero-actions" style="justify-content:center">
      <a href="{{ url('/register') }}" class="btn btn-primary btn-lg">🎓 Get Started Free</a>
      <a href="{{ url('/courses') }}" class="btn btn-ghost btn-lg">Browse Courses</a>
    </div>
  </div>
</section>
@endsection
