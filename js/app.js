/* =============================================
   SKILLNEST — CORE APP ENGINE
   Data Store, Auth, Utilities
   ============================================= */

const DB_KEY = 'skillnest_db';

// =============================================
// THEME TOGGLER & INITIALIZER
// =============================================
window.toggleTheme = function() {
  const currentTheme = localStorage.getItem('theme') || 'dark';
  const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
  document.body.classList.toggle('light-theme', newTheme === 'light');
  localStorage.setItem('theme', newTheme);
  
  // Update toggle icons
  document.querySelectorAll('.theme-toggle-btn').forEach(btn => {
    btn.innerHTML = newTheme === 'light' ? '🌙' : '☀️';
  });
};

function initTheme() {
  const currentTheme = localStorage.getItem('theme') || 'dark';
  document.body.classList.toggle('light-theme', currentTheme === 'light');
  
  // Ensure the button state matches current theme once DOM load is complete
  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.theme-toggle-btn').forEach(btn => {
      btn.innerHTML = currentTheme === 'light' ? '🌙' : '☀️';
    });
  });
}

initTheme();

// ---- SEED DATA ----
const SEED_DATA = {
  users: [
    { id: 'u1', name: 'M Usman Shafique', email: 'student@demo.com', password: 'password123', role: 'student', avatar: '', bio: 'Passionate learner exploring web development.', created_at: '2026-01-10', status: 'active', enrolled: ['c1', 'c2', 'c4'] },
    { id: 'u2', name: 'M Usman Shafique', email: 'teacher@demo.com', password: 'password123', role: 'teacher', avatar: '', bio: 'Full-stack developer with 8 years of experience teaching online.', created_at: '2025-12-01', status: 'active', courses: ['c1', 'c2', 'c3'] },
    { id: 'u3', name: 'Admin User', email: 'admin@demo.com', password: 'password123', role: 'admin', avatar: '', bio: 'Platform administrator.', created_at: '2025-11-01', status: 'active' },
    { id: 'u4', name: 'M Usman Shafique', email: 'usman@demo.com', password: 'password123', role: 'student', avatar: '', bio: '', created_at: '2026-02-14', status: 'active', enrolled: ['c1', 'c3'] },
    { id: 'u5', name: 'M Usman Shafique', email: 'usman1@demo.com', password: 'password123', role: 'teacher', avatar: '', bio: 'UI/UX designer and React expert.', created_at: '2026-01-20', status: 'active', courses: ['c4', 'c5'] },
    { id: 'u6', name: 'M Usman Shafique', email: 'usman2@demo.com', password: 'password123', role: 'student', avatar: '', bio: '', created_at: '2026-03-05', status: 'inactive', enrolled: ['c2'] },
  ],
  courses: [
    { id: 'c1', teacher_id: 'u2', title: 'Complete Web Development Bootcamp', description: 'Master HTML, CSS, JavaScript, React, Node.js, and MongoDB in this comprehensive bootcamp. Build 15 real-world projects and launch your web development career.', thumbnail: 'https://images.unsplash.com/photo-1593720213428-28a5b9e94613?w=600&q=80', category: 'Web Development', level: 'Beginner', price: 0, status: 'published', rating: 4.8, students: 1240, created_at: '2026-01-15', tags: ['HTML', 'CSS', 'JavaScript', 'React'] },
    { id: 'c2', teacher_id: 'u2', title: 'Advanced React & Redux Mastery', description: 'Deep dive into React hooks, context, Redux Toolkit, testing, and performance optimization. Build production-ready applications with modern React patterns.', thumbnail: 'https://images.unsplash.com/photo-1633356122544-f134324a6cee?w=600&q=80', category: 'Web Development', level: 'Advanced', price: 49, status: 'published', rating: 4.9, students: 876, created_at: '2026-02-01', tags: ['React', 'Redux', 'TypeScript'] },
    { id: 'c3', teacher_id: 'u2', title: 'Python for Data Science & ML', description: 'Learn Python, NumPy, Pandas, Matplotlib, and Scikit-learn. Analyze real datasets and build machine learning models from scratch.', thumbnail: 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=600&q=80', category: 'Data Science', level: 'Intermediate', price: 29, status: 'published', rating: 4.7, students: 2100, created_at: '2026-01-20', tags: ['Python', 'ML', 'Data Science'] },
    { id: 'c4', teacher_id: 'u5', title: 'UI/UX Design: From Wireframe to Prototype', description: 'Master the complete design process — user research, wireframing, prototyping in Figma, and usability testing. Create stunning interfaces that users love.', thumbnail: 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=600&q=80', category: 'Design', level: 'Beginner', price: 0, status: 'published', rating: 4.6, students: 940, created_at: '2026-02-10', tags: ['Figma', 'UX', 'Design'] },
    { id: 'c5', teacher_id: 'u5', title: 'Mobile App Design with Figma', description: 'Design beautiful, user-centered mobile applications using Figma. Learn component libraries, auto-layout, prototyping, and developer handoff.', thumbnail: 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=600&q=80', category: 'Design', level: 'Intermediate', price: 39, status: 'published', rating: 4.5, students: 450, created_at: '2026-03-01', tags: ['Figma', 'Mobile', 'UI'] },
    { id: 'c6', teacher_id: 'u2', title: 'Node.js & Express Backend Development', description: 'Build scalable REST APIs with Node.js, Express, PostgreSQL, and JWT authentication. Deploy to cloud with CI/CD pipelines.', thumbnail: 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=600&q=80', category: 'Backend', level: 'Intermediate', price: 35, status: 'pending', rating: 4.8, students: 0, created_at: '2026-04-01', tags: ['Node.js', 'Express', 'PostgreSQL'] },
  ],
  lectures: [
    { id: 'l1', course_id: 'c1', title: 'Welcome & Course Overview', duration: '5:20', order_index: 1, description: 'Introduction to what you will learn in this course.' },
    { id: 'l2', course_id: 'c1', title: 'Setting Up Your Development Environment', duration: '12:45', order_index: 2, description: 'Install VS Code, Node.js, and configure Git.' },
    { id: 'l3', course_id: 'c1', title: 'HTML Fundamentals & Semantic Markup', duration: '28:10', order_index: 3, description: 'Learn the building blocks of the web.' },
    { id: 'l4', course_id: 'c1', title: 'CSS Styling & Box Model', duration: '34:55', order_index: 4, description: 'Style your pages with CSS. Master the box model and layout.' },
    { id: 'l5', course_id: 'c1', title: 'CSS Flexbox & Grid Layouts', duration: '42:30', order_index: 5, description: 'Build complex responsive layouts.' },
    { id: 'l6', course_id: 'c1', title: 'JavaScript Basics & DOM', duration: '51:15', order_index: 6, description: 'Variables, functions, events, and DOM manipulation.' },
    { id: 'l7', course_id: 'c1', title: 'Async JS: Promises & Fetch API', duration: '38:00', order_index: 7, description: 'Handle async operations and API calls.' },
    { id: 'l8', course_id: 'c1', title: 'Introduction to React', duration: '45:20', order_index: 8, description: 'Components, props, state, and hooks.' },
    { id: 'l9', course_id: 'c2', title: 'React Hooks Deep Dive', duration: '55:10', order_index: 1, description: 'useState, useEffect, useRef, useMemo, useCallback.' },
    { id: 'l10', course_id: 'c2', title: 'Context API & State Management', duration: '48:30', order_index: 2, description: 'Managing global state without Redux.' },
    { id: 'l11', course_id: 'c2', title: 'Redux Toolkit Fundamentals', duration: '62:00', order_index: 3, description: 'Modern Redux with RTK and createSlice.' },
    { id: 'l12', course_id: 'c3', title: 'Python Basics Review', duration: '30:00', order_index: 1, description: 'Data types, loops, functions, OOP.' },
    { id: 'l13', course_id: 'c3', title: 'NumPy for Numerical Computing', duration: '44:15', order_index: 2, description: 'Arrays, broadcasting, and matrix ops.' },
    { id: 'l14', course_id: 'c4', title: 'Introduction to UX Design', duration: '22:10', order_index: 1, description: 'UX principles, design thinking.' },
    { id: 'l15', course_id: 'c4', title: 'User Research Methods', duration: '35:40', order_index: 2, description: 'Interviews, surveys, personas.' },
    { id: 'l16', course_id: 'c4', title: 'Wireframing with Figma', duration: '48:20', order_index: 3, description: 'Low and high-fidelity wireframes.' },
  ],
  enrollments: [
    { id: 'e1', student_id: 'u1', course_id: 'c1', progress: 62, enrolled_at: '2026-02-01', completed_lectures: ['l1', 'l2', 'l3', 'l4', 'l5'], last_lecture: 'l6' },
    { id: 'e2', student_id: 'u1', course_id: 'c2', progress: 33, enrolled_at: '2026-03-10', completed_lectures: ['l9'], last_lecture: 'l10' },
    { id: 'e3', student_id: 'u1', course_id: 'c4', progress: 100, enrolled_at: '2026-01-20', completed_lectures: ['l14', 'l15', 'l16'], last_lecture: 'l16', completed: true },
    { id: 'e4', student_id: 'u4', course_id: 'c1', progress: 87, enrolled_at: '2026-01-25', completed_lectures: ['l1', 'l2', 'l3', 'l4', 'l5', 'l6', 'l7'], last_lecture: 'l8' },
    { id: 'e5', student_id: 'u4', course_id: 'c3', progress: 45, enrolled_at: '2026-02-28', completed_lectures: ['l12'], last_lecture: 'l13' },
    { id: 'e6', student_id: 'u6', course_id: 'c2', progress: 10, enrolled_at: '2026-03-20', completed_lectures: [], last_lecture: 'l9' },
  ],
  quizzes: [
    { id: 'q1', course_id: 'c1', title: 'HTML & CSS Fundamentals Quiz', time_limit: 15, max_attempts: 3 },
    { id: 'q2', course_id: 'c1', title: 'JavaScript Basics Assessment', time_limit: 20, max_attempts: 3 },
    { id: 'q3', course_id: 'c2', title: 'React Hooks Mastery Test', time_limit: 25, max_attempts: 2 },
    { id: 'q4', course_id: 'c4', title: 'UX Design Principles Quiz', time_limit: 10, max_attempts: 3 },
  ],
  questions: [
    { id: 'qn1', quiz_id: 'q1', type: 'mcq', question_text: 'Which HTML tag is used to define the largest heading?', options: ['<h6>', '<h1>', '<header>', '<head>'], correct_answer: 1 },
    { id: 'qn2', quiz_id: 'q1', type: 'mcq', question_text: 'Which CSS property controls the text size?', options: ['font-style', 'text-size', 'font-size', 'text-style'], correct_answer: 2 },
    { id: 'qn3', quiz_id: 'q1', type: 'tf', question_text: 'CSS Flexbox is a one-dimensional layout method.', options: ['True', 'False'], correct_answer: 0 },
    { id: 'qn4', quiz_id: 'q1', type: 'mcq', question_text: 'What does the CSS "box model" include?', options: ['Content only', 'Content, padding, border, margin', 'Content and margin only', 'Border and padding only'], correct_answer: 1 },
    { id: 'qn5', quiz_id: 'q1', type: 'mcq', question_text: 'Which selector targets an element with id="main"?', options: ['.main', '#main', '*main', 'main'], correct_answer: 1 },
    { id: 'qn6', quiz_id: 'q2', type: 'mcq', question_text: 'What keyword declares a block-scoped variable in JavaScript?', options: ['var', 'let', 'def', 'int'], correct_answer: 1 },
    { id: 'qn7', quiz_id: 'q2', type: 'tf', question_text: 'JavaScript is a statically typed language.', options: ['True', 'False'], correct_answer: 1 },
    { id: 'qn8', quiz_id: 'q2', type: 'mcq', question_text: 'Which method adds an element to the end of an array?', options: ['push()', 'pop()', 'shift()', 'unshift()'], correct_answer: 0 },
    { id: 'qn9', quiz_id: 'q3', type: 'mcq', question_text: 'Which hook is used to manage side effects in React?', options: ['useState', 'useEffect', 'useReducer', 'useContext'], correct_answer: 1 },
    { id: 'qn10', quiz_id: 'q3', type: 'mcq', question_text: 'What is the second argument to useEffect?', options: ['A callback', 'A dependency array', 'A state value', 'A ref'], correct_answer: 1 },
    { id: 'qn11', quiz_id: 'q4', type: 'mcq', question_text: 'What does UX stand for?', options: ['User Experience', 'User Extension', 'Unified Exchange', 'User Execution'], correct_answer: 0 },
    { id: 'qn12', quiz_id: 'q4', type: 'tf', question_text: 'A wireframe is a high-fidelity design prototype.', options: ['True', 'False'], correct_answer: 1 },
  ],
  quiz_attempts: [
    { id: 'a1', student_id: 'u1', quiz_id: 'q4', score: 100, answers: { qn11: 0, qn12: 1 }, submitted_at: '2026-02-15', passed: true },
  ],
  categories: [
    { id: 'cat1', name: 'Web Development', icon: '💻', color: '#6366F1', count: 3 },
    { id: 'cat2', name: 'Data Science', icon: '📊', color: '#10B981', count: 1 },
    { id: 'cat3', name: 'Design', icon: '🎨', color: '#F59E0B', count: 2 },
    { id: 'cat4', name: 'Backend', icon: '⚙️', color: '#3B82F6', count: 1 },
    { id: 'cat5', name: 'Mobile', icon: '📱', color: '#8B5CF6', count: 0 },
    { id: 'cat6', name: 'DevOps', icon: '🚀', color: '#EC4899', count: 0 },
  ],
  settings: {
    platform_name: 'SkillNest',
    platform_tagline: 'Learn Without Limits',
    logo_url: '',
    support_email: 'support@skillnest.io',
    allow_registration: true,
    require_approval: false,
    maintenance_mode: false,
  }
};

// =============================================
// API BRIDGE (LARAVEL <-> FRONTEND REST CONNECTION)
// =============================================
function apiRequest(method, url, data = null) {
  const xhr = new XMLHttpRequest();
  const session = JSON.parse(sessionStorage.getItem('skillnest_session') || '{}');
  const token = session.token;
  
  let origin = window.location.origin;
  if (origin === 'null' || window.location.protocol === 'file:') {
    origin = 'http://localhost';
  }
  const root = origin + '/SkillNet/skillnest-backend/public/api';
  xhr.open(method, root + url, false); // Synchronous requests to integrate cleanly with legacy code
  
  xhr.setRequestHeader('Content-Type', 'application/json');
  xhr.setRequestHeader('Accept', 'application/json');
  if (token) {
    xhr.setRequestHeader('Authorization', 'Bearer ' + token);
  }
  
  try {
    xhr.send(data ? JSON.stringify(data) : null);
    if (xhr.status >= 200 && xhr.status < 300) {
      return JSON.parse(xhr.responseText || '{}');
    } else {
      const err = JSON.parse(xhr.responseText || '{}');
      return { success: false, message: err.message || 'API request failed' };
    }
  } catch (e) {
    console.error('API Connection Error:', e);
    return { success: false, message: 'Network error or server unreachable' };
  }
}

// =============================================
// DATABASE LAYER
// =============================================
const DB = {
  data: null,

  init() {
    if (!this.data) {
      const res = apiRequest('GET', '/db/all');
      if (res && !res.message) {
        this.data = res;
        console.log('✅ SkillNest DB loaded from MySQL (XAMPP).');
      } else {
        // Fallback to localStorage / SEED_DATA if server fails
        const raw = localStorage.getItem(DB_KEY);
        this.data = raw ? JSON.parse(raw) : SEED_DATA;
        console.warn('⚠️ SkillNest DB loaded from fallback cache:', res ? res.message : 'No connection');
      }
    }
    return this.data;
  },
  save(data) {
    this.data = data;
    localStorage.setItem(DB_KEY, JSON.stringify(data));
  },
  reset() {
    // Re-seed DB by executing migrations trigger or clearing local values
    this.data = null;
    this.init();
  },
  // Generic CRUD
  getAll(table) { 
    this.init();
    return this.data[table] || []; 
  },
  getById(table, id) { 
    return this.getAll(table).find(r => r.id === id) || null; 
  },
  insert(table, record) {
    this.init();
    
    let res = null;
    if (table === 'enrollments') {
      res = apiRequest('POST', '/enrollments', {
        course_id: record.course_id
      });
    } else if (table === 'courses') {
      res = apiRequest('POST', '/courses', record);
    } else if (table === 'lectures') {
      res = apiRequest('POST', '/lectures', record);
    } else if (table === 'quizzes') {
      res = apiRequest('POST', '/quizzes', record);
    } else if (table === 'questions') {
      res = apiRequest('POST', '/questions', record);
    } else if (table === 'quiz_attempts') {
      res = apiRequest('POST', '/quiz-attempts', record);
    }
    
    if (res && res.success) {
      const savedRecord = res.enrollment || res.course || res.lecture || res.quiz || res.question || res.attempt || record;
      this.data[table].push(savedRecord);
      this.save(this.data);
      return savedRecord;
    }
    
    // Local fallback
    this.data[table].push(record);
    this.save(this.data);
    return record;
  },
  update(table, id, updates) {
    this.init();
    const idx = this.data[table].findIndex(r => r.id === id);
    if (idx === -1) return null;
    
    let res = null;
    if (table === 'users') {
      if (updates.status !== undefined && Object.keys(updates).length === 1) {
        res = apiRequest('PUT', '/users/' + id + '/status', { status: updates.status });
      } else {
        res = apiRequest('PUT', '/users/' + id, updates);
      }
    } else if (table === 'courses') {
      if (updates.status !== undefined && Object.keys(updates).length === 1) {
        res = apiRequest('PUT', '/courses/' + id + '/status', { status: updates.status });
      } else {
        res = apiRequest('PUT', '/courses/' + id, updates);
      }
    } else if (table === 'lectures') {
      res = apiRequest('PUT', '/lectures/' + id, updates);
    } else if (table === 'enrollments') {
      res = apiRequest('PUT', '/enrollments/' + id, updates);
    } else if (table === 'settings') {
      res = apiRequest('PUT', '/settings', updates);
    }
    
    this.data[table][idx] = { ...this.data[table][idx], ...updates };
    this.save(this.data);
    return this.data[table][idx];
  },
  delete(table, id) {
    this.init();
    
    let res = null;
    if (table === 'courses') {
      res = apiRequest('DELETE', '/courses/' + id);
    } else if (table === 'lectures') {
      res = apiRequest('DELETE', '/lectures/' + id);
    } else if (table === 'questions') {
      res = apiRequest('DELETE', '/questions/' + id);
    }
    
    this.data[table] = this.data[table].filter(r => r.id !== id);
    this.save(this.data);
  },
  where(table, field, value) { 
    return this.getAll(table).filter(r => r[field] === value); 
  },
};

// =============================================
// AUTH LAYER
// =============================================
const Auth = {
  SESSION_KEY: 'skillnest_session',

  login(email, password) {
    const res = apiRequest('POST', '/auth/login', { email: email.trim().toLowerCase(), password: password });
    if (res && res.success) {
      const session = { 
        userId: res.session.userId, 
        role: res.session.role, 
        name: res.session.name, 
        email: res.session.email,
        token: res.token 
      };
      sessionStorage.setItem(this.SESSION_KEY, JSON.stringify(session));
      return { success: true, user: res.user, session };
    }
    return { success: false, message: res.message || 'Invalid email or password.' };
  },

  register(data) {
    const res = apiRequest('POST', '/auth/register', {
      name: data.name,
      email: data.email.trim().toLowerCase(),
      password: data.password,
      role: data.role || 'student'
    });
    if (res && res.success) {
      const session = { 
        userId: res.session.userId, 
        role: res.session.role, 
        name: res.session.name, 
        email: res.session.email,
        token: res.token 
      };
      sessionStorage.setItem(this.SESSION_KEY, JSON.stringify(session));
      return { success: true, user: res.user, session };
    }
    return { success: false, message: res.message || 'Registration failed.' };
  },

  logout() {
    apiRequest('POST', '/auth/logout');
    sessionStorage.removeItem(this.SESSION_KEY);
    window.location.href = rootPath() + 'index.html';
  },

  getSession() {
    const raw = sessionStorage.getItem(this.SESSION_KEY);
    return raw ? JSON.parse(raw) : null;
  },

  getCurrentUser() {
    const session = this.getSession();
    if (!session) return null;
    return DB.getById('users', session.userId);
  },

  requireAuth(allowedRoles = null) {
    const session = this.getSession();
    if (!session) {
      window.location.href = rootPath() + 'login.html';
      return null;
    }
    if (allowedRoles && !allowedRoles.includes(session.role)) {
      const dest = session.role === 'admin' ? 'admin/dashboard.html' :
        session.role === 'teacher' ? 'teacher/dashboard.html' : 'student/dashboard.html';
      window.location.href = rootPath() + dest;
      return null;
    }
    return session;
  },

  redirectIfLoggedIn() {
    const session = this.getSession();
    if (session) {
      const dest = session.role === 'admin' ? 'admin/dashboard.html' :
        session.role === 'teacher' ? 'teacher/dashboard.html' : 'student/dashboard.html';
      window.location.href = rootPath() + dest;
    }
  }
};

// =============================================
// UTILITY FUNCTIONS
// =============================================

function rootPath() {
  const path = window.location.pathname.replace(/\\/g, '/');
  if (path.includes('/student/') || path.includes('/teacher/') || path.includes('/admin/')) return '../';
  return '';
}

function generateId(prefix = 'id') {
  return prefix + '_' + Date.now() + '_' + Math.random().toString(36).substr(2, 6);
}

function formatDate(dateStr) {
  if (!dateStr) return 'N/A';
  const d = new Date(dateStr);
  return d.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
}

function timeAgo(dateStr) {
  const now = new Date();
  const d = new Date(dateStr);
  const diff = Math.floor((now - d) / 1000);
  if (diff < 60) return 'just now';
  if (diff < 3600) return Math.floor(diff / 60) + 'm ago';
  if (diff < 86400) return Math.floor(diff / 3600) + 'h ago';
  if (diff < 604800) return Math.floor(diff / 86400) + 'd ago';
  return formatDate(dateStr);
}

function stars(rating) {
  let html = '<div class="stars">';
  for (let i = 1; i <= 5; i++) {
    html += `<span class="star${i > Math.round(rating) ? ' empty' : ''}">★</span>`;
  }
  html += '</div>';
  return html;
}

function truncate(str, len = 80) {
  return str && str.length > len ? str.substring(0, len) + '…' : (str || '');
}

function formatPrice(price) {
  return price === 0 ? 'Free' : '$' + price;
}

function levelBadge(level) {
  const map = { 'Beginner': 'accent', 'Intermediate': 'amber', 'Advanced': 'danger' };
  return `<span class="badge badge-${map[level] || 'muted'}">${level}</span>`;
}

function statusBadge(status) {
  const map = { 'published': ['accent', 'Published'], 'pending': ['amber', 'Pending'], 'draft': ['muted', 'Draft'], 'rejected': ['danger', 'Rejected'], 'active': ['accent', 'Active'], 'inactive': ['danger', 'Inactive'] };
  const [cls, label] = map[status] || ['muted', status];
  return `<span class="badge badge-${cls}">${label}</span>`;
}

function avatarInitials(name) {
  return name ? name.split(' ').map(w => w[0]).join('').toUpperCase().substring(0, 2) : '?';
}

// =============================================
// TOAST NOTIFICATIONS
// =============================================
function showToast(message, type = 'info', duration = 3500) {
  let container = document.querySelector('.toast-container');
  if (!container) {
    container = document.createElement('div');
    container.className = 'toast-container';
    document.body.appendChild(container);
  }
  const icons = { success: '✅', error: '❌', info: 'ℹ️', warning: '⚠️' };
  const toast = document.createElement('div');
  toast.className = `toast ${type}`;
  toast.innerHTML = `<span>${icons[type] || 'ℹ️'}</span> <span>${message}</span>`;
  container.appendChild(toast);
  setTimeout(() => {
    toast.style.opacity = '0';
    toast.style.transform = 'translateX(100px)';
    toast.style.transition = 'all 0.3s ease';
    setTimeout(() => toast.remove(), 300);
  }, duration);
}

// =============================================
// NAVBAR / SIDEBAR RENDERING
// =============================================
function renderPublicNav(activePage = '') {
  const session = Auth.getSession();
  const root = rootPath();
  return `
  <nav class="navbar" id="mainNav">
    <div class="container navbar-inner">
      <a href="${root}index.html" class="navbar-logo">
        <div class="logo-icon">🎓</div>
        <span class="brand">SkillNest</span>
      </a>
      <ul class="nav-links">
        <li><a href="${root}index.html" class="${activePage === 'home' ? 'active' : ''}">Home</a></li>
        <li><a href="${root}courses.html" class="${activePage === 'courses' ? 'active' : ''}">Courses</a></li>
        <li><a href="${root}courses.html?cat=Design" class="">Design</a></li>
        <li><a href="${root}courses.html?cat=Data+Science" class="">Data Science</a></li>
      </ul>
      <div class="nav-actions">
        <button class="theme-toggle-btn btn btn-ghost btn-sm" onclick="toggleTheme()" style="padding: 0 10px; font-size: 1.1rem; border-radius: 50%; width: 36px; height: 36px; display: flex; align-items: center; justify-content: center; margin-right: 8px;">☀️</button>
        ${session ? `
          <a href="${root}${session.role}/dashboard.html" class="btn btn-outline btn-sm">Dashboard</a>
          <div class="nav-avatar-wrapper" onclick="toggleDropdown(event, '.avatar-dropdown')" style="position:relative;cursor:pointer">
            <div class="nav-avatar" title="${session.name}">${avatarInitials(session.name)}</div>
            <div class="avatar-dropdown dropdown-menu" style="display:none;position:absolute;right:0;top:110%;background:var(--bg-card);border:1px solid var(--border);border-radius:var(--radius);padding:8px;min-width:160px;box-shadow:0 8px 24px rgba(0,0,0,0.15);z-index:100;text-align:left;">
              <a href="${root}student/profile.html" style="display:block;padding:10px 12px;color:var(--text-primary);text-decoration:none;border-radius:6px;font-size:0.9rem;transition:background 0.2s;" onmouseover="this.style.background='var(--bg-body)'" onmouseout="this.style.background='transparent'">👤 View Profile</a>
              <div style="cursor:pointer;display:block;padding:10px 12px;color:var(--danger);text-decoration:none;border-radius:6px;font-size:0.9rem;transition:background 0.2s;margin-top:4px" onmouseover="this.style.background='var(--bg-body)'" onmouseout="this.style.background='transparent'" onclick="Auth.logout()">🚪 Logout</div>
            </div>
          </div>
        ` : `
          <a href="${root}login.html" class="btn btn-ghost btn-sm">Login</a>
          <a href="${root}register.html" class="btn btn-primary btn-sm">Get Started</a>
        `}
        <div class="hamburger" onclick="toggleMobileMenu()">
          <span></span><span></span><span></span>
        </div>
      </div>
    </div>
  </nav>`;
}

function renderPublicFooter() {
  const root = rootPath();
  return `
  <footer class="footer">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-brand">
          <div class="navbar-logo" style="font-size:1.3rem;display:flex;align-items:center;gap:10px;margin-bottom:16px;">
            <div class="logo-icon">🎓</div>
            <span class="brand">SkillNest</span>
          </div>
          <p>Empowering learners worldwide with expert-led courses and a modern learning experience.</p>
          <div class="social-links" style="margin-top:20px">
            <a class="social-link" href="#" title="Twitter">𝕏</a>
            <a class="social-link" href="#" title="LinkedIn">in</a>
            <a class="social-link" href="#" title="YouTube">▶</a>
            <a class="social-link" href="#" title="GitHub">⌥</a>
          </div>
        </div>
        <div class="footer-col">
          <h5>Learn</h5>
          <a href="${root}courses.html">All Courses</a>
          <a href="${root}courses.html?cat=Web+Development">Web Development</a>
          <a href="${root}courses.html?cat=Design">UI/UX Design</a>
          <a href="${root}courses.html?cat=Data+Science">Data Science</a>
        </div>
        <div class="footer-col">
          <h5>Platform</h5>
          <a href="${root}register.html">Join as Student</a>
          <a href="${root}register.html?role=teacher">Become a Teacher</a>
          <a href="${root}login.html">Login</a>
          <a href="#">Help Center</a>
        </div>
        <div class="footer-col">
          <h5>Company</h5>
          <a href="#">About Us</a>
          <a href="#">Careers</a>
          <a href="#">Privacy Policy</a>
          <a href="#">Terms of Service</a>
        </div>
      </div>
      <div class="footer-bottom">
        <p>M Usman Shafique (MUSA) © 2026 SkillNest. All rights reserved. Built with ❤️</p>
        <div style="font-size:.82rem;color:var(--text-muted)">Demo: student@demo.com / teacher@demo.com / admin@demo.com (all: password123)</div>
      </div>
    </div>
  </footer>`;
}

function renderSidebar(role, activePage) {
  const session = Auth.getSession();
  if (!session) return '';
  const user = DB.getById('users', session.userId);
  const root = '../';

  const navs = {
    student: [
      { section: 'Main' },
      { href: 'dashboard.html', icon: '🏠', label: 'Dashboard', page: 'dashboard' },
      { href: `${root}courses.html`, icon: '📚', label: 'Browse Courses', page: 'browse' },
      { section: 'Learning' },
      { href: 'dashboard.html#enrolled', icon: '🎓', label: 'My Courses', page: 'my-courses' },
      { href: 'quiz.html', icon: '📝', label: 'Quizzes', page: 'quiz' },
      { href: 'profile.html', icon: '👤', label: 'Profile', page: 'profile' },
    ],
    teacher: [
      { section: 'Main' },
      { href: 'dashboard.html', icon: '🏠', label: 'Dashboard', page: 'dashboard' },
      { section: 'Content' },
      { href: 'create-course.html', icon: '➕', label: 'Create Course', page: 'create' },
      { href: 'manage-course.html', icon: '📂', label: 'My Courses', page: 'manage' },
      { href: 'upload-lecture.html', icon: '🎬', label: 'Upload Lecture', page: 'upload' },
      { href: 'quiz-builder.html', icon: '📝', label: 'Quiz Builder', page: 'quiz-builder' },
      { section: 'Account' },
      { href: `${root}student/profile.html`, icon: '👤', label: 'Profile', page: 'profile' },
    ],
    admin: [
      { section: 'Overview' },
      { href: 'dashboard.html', icon: '📊', label: 'Dashboard', page: 'dashboard' },
      { section: 'Management' },
      { href: 'users.html', icon: '👥', label: 'Users', page: 'users' },
      { href: 'courses.html', icon: '📚', label: 'Courses', page: 'courses' },
      { href: 'categories.html', icon: '🏷️', label: 'Categories', page: 'categories' },
      { section: 'System' },
      { href: 'settings.html', icon: '⚙️', label: 'Settings', page: 'settings' },
    ],
  };

  const links = navs[role] || [];
  let linksHtml = '';
  links.forEach(item => {
    if (item.section) {
      linksHtml += `<div class="nav-section-label">${item.section}</div>`;
    } else {
      const active = activePage === item.page ? 'active' : '';
      linksHtml += `<a href="${item.href}" class="sidebar-link ${active}">
        <span class="icon">${item.icon}</span>
        <span>${item.label}</span>
      </a>`;
    }
  });

  return `
  <aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
      <div class="sidebar-logo">
        <div class="logo-icon">🎓</div>
        <span class="brand">SkillNest</span>
      </div>
    </div>
    <nav class="sidebar-nav">${linksHtml}</nav>
    <div class="sidebar-footer">
      <div class="sidebar-user">
        <div class="sidebar-avatar">${avatarInitials(session.name)}</div>
        <div class="sidebar-user-info">
          <div class="sidebar-user-name">${session.name}</div>
          <div class="sidebar-user-role" style="text-transform:capitalize">${session.role}</div>
        </div>
        <button onclick="Auth.logout()" title="Logout" style="background:none;border:none;color:var(--text-muted);cursor:pointer;font-size:1.1rem;margin-left:auto">⇦</button>
      </div>
    </div>
  </aside>`;
}

function renderTopbar(title) {
  const session = Auth.getSession();
  
  // Calculate notifications
  let notifsHtml = `<div style="padding:12px 16px;border-bottom:1px solid var(--border-light);">
    <div style="font-weight:600;font-size:0.85rem;margin-bottom:4px;color:var(--text-primary)">👋 Welcome to SkillNest!</div>
    <div style="color:var(--text-secondary);font-size:0.75rem">We're glad to have you here.</div>
  </div>`;
  let notifCount = 1;
  
  if (session && session.userId) {
    const enrollments = DB.where('enrollments', 'student_id', session.userId);
    const completed = enrollments.filter(e => e.progress === 100);
    completed.forEach(e => {
      const course = DB.getById('courses', e.course_id);
      if (course) {
        notifCount++;
        notifsHtml += `<div style="padding:12px 16px;border-bottom:1px solid var(--border-light);">
          <div style="font-weight:600;font-size:0.85rem;color:var(--amber);margin-bottom:4px">🏆 Certification Complete</div>
          <div style="color:var(--text-secondary);font-size:0.75rem">You earned a certificate for <strong>${course.title}</strong></div>
        </div>`;
      }
    });
  }

  return `
  <header class="topbar">
    <div class="topbar-left">
      <button class="sidebar-toggle" onclick="toggleSidebar()" title="Toggle Sidebar">☰</button>
      <span class="topbar-title">${title}</span>
    </div>
    <div class="topbar-right">
      <button class="theme-toggle-btn" onclick="toggleTheme()" title="Toggle Theme" style="background:var(--bg-card); border:1px solid var(--border-light); border-radius:8px; width:36px; height:36px; display:flex; align-items:center; justify-content:center; cursor:pointer; color:var(--text-secondary); transition:var(--transition-fast); margin-right: 8px;">☀️</button>
      <div class="notif-wrapper" onclick="toggleDropdown(event, '.notif-dropdown')" style="position:relative;cursor:pointer;display:flex;align-items:center;">
        <div class="notif-btn" title="Notifications">
          🔔 <span class="notif-dot" style="${notifCount > 0 ? 'display:block' : 'display:none'}"></span>
        </div>
        <div class="notif-dropdown dropdown-menu" style="display:none;position:absolute;right:0;top:120%;background:var(--bg-card);border:1px solid var(--border);border-radius:var(--radius-lg);width:300px;box-shadow:0 8px 24px rgba(0,0,0,0.15);z-index:100;text-align:left;overflow:hidden;">
          <div style="padding:12px 16px;background:var(--bg-body);font-weight:600;border-bottom:1px solid var(--border);">Notifications (${notifCount})</div>
          <div style="max-height:300px;overflow-y:auto;">
            ${notifsHtml}
          </div>
        </div>
      </div>
      <div class="nav-avatar-wrapper" onclick="toggleDropdown(event, '.avatar-dropdown')" style="position:relative;cursor:pointer">
        <div class="nav-avatar" style="width:36px;height:36px;font-size:0.82rem;">${avatarInitials(session?.name)}</div>
        <div class="avatar-dropdown dropdown-menu" style="display:none;position:absolute;right:0;top:110%;background:var(--bg-card);border:1px solid var(--border);border-radius:var(--radius);padding:8px;min-width:160px;box-shadow:0 8px 24px rgba(0,0,0,0.15);z-index:100;text-align:left;">
          <a href="../student/profile.html" style="display:block;padding:10px 12px;color:var(--text-primary);text-decoration:none;border-radius:6px;font-size:0.9rem;transition:background 0.2s;" onmouseover="this.style.background='var(--bg-body)'" onmouseout="this.style.background='transparent'">👤 View Profile</a>
          <div style="cursor:pointer;display:block;padding:10px 12px;color:var(--danger);text-decoration:none;border-radius:6px;font-size:0.9rem;transition:background 0.2s;margin-top:4px" onmouseover="this.style.background='var(--bg-body)'" onmouseout="this.style.background='transparent'" onclick="Auth.logout()">🚪 Logout</div>
        </div>
      </div>
    </div>
  </header>`;
}

// Generic Dropdown Toggle
window.toggleDropdown = function(e, selector) {
  e.stopPropagation();
  const dropdown = e.currentTarget.querySelector(selector);
  const allDropdowns = document.querySelectorAll('.dropdown-menu');
  allDropdowns.forEach(d => { if(d !== dropdown) d.style.display = 'none'; });
  if (dropdown) {
    dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
  }
};

window.addEventListener('click', function() {
  const allDropdowns = document.querySelectorAll('.dropdown-menu');
  allDropdowns.forEach(d => { d.style.display = 'none'; });
});

// =============================================
// UI HELPERS
// =============================================
function toggleSidebar() {
  const sidebar = document.getElementById('sidebar');
  const main = document.getElementById('dashMain');
  if (!sidebar) return;
  sidebar.classList.toggle('collapsed');
  if (main) main.classList.toggle('expanded');
  // Mobile
  if (window.innerWidth <= 768) {
    sidebar.classList.toggle('open');
    sidebar.classList.remove('collapsed');
  }
}

function toggleMobileMenu() {
  const nav = document.querySelector('.nav-links');
  if (nav) nav.style.display = nav.style.display === 'flex' ? 'none' : 'flex';
}

// Accordion
function initAccordions() {
  document.querySelectorAll('.accordion-header').forEach(header => {
    header.addEventListener('click', () => {
      const item = header.closest('.accordion-item');
      const wasOpen = item.classList.contains('open');
      document.querySelectorAll('.accordion-item').forEach(i => i.classList.remove('open'));
      if (!wasOpen) item.classList.add('open');
    });
  });
}

// Tabs
function initTabs(containerSelector = '.tabs') {
  document.querySelectorAll(containerSelector).forEach(tabsEl => {
    tabsEl.querySelectorAll('.tab-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const target = btn.dataset.tab;
        tabsEl.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        // If data-tabs-parent is on the .tabs element itself, use its parentElement;
        // otherwise walk up the DOM to find a container with that attribute.
        const panel = tabsEl.dataset.tabsParent
          ? tabsEl.parentElement
          : (tabsEl.closest('[data-tabs-parent]') || document);
        panel.querySelectorAll('.tab-content').forEach(c => {
          c.classList.toggle('active', c.id === target || c.dataset.tab === target);
        });
      });
    });
  });
}

// Animated counter
function animateCounters() {
  document.querySelectorAll('[data-count]').forEach(el => {
    const target = parseInt(el.dataset.count);
    const duration = 1500;
    const start = performance.now();
    function update(time) {
      const elapsed = time - start;
      const progress = Math.min(elapsed / duration, 1);
      const eased = 1 - Math.pow(1 - progress, 3);
      el.textContent = Math.floor(eased * target).toLocaleString() + (el.dataset.suffix || '');
      if (progress < 1) requestAnimationFrame(update);
    }
    requestAnimationFrame(update);
  });
}

// Scroll navbar effect
function initNavbarScroll() {
  const nav = document.getElementById('mainNav');
  if (!nav) return;
  window.addEventListener('scroll', () => {
    nav.classList.toggle('scrolled', window.scrollY > 50);
  });
}

// Intersection observer for animations
function initScrollAnimations() {
  const els = document.querySelectorAll('.animate-on-scroll');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('animate-fade-up');
        observer.unobserve(e.target);
      }
    });
  }, { threshold: 0.1 });
  els.forEach(el => observer.observe(el));
}

// Modal helpers
function openModal(id) { document.getElementById(id)?.classList.add('open'); }
function closeModal(id) { document.getElementById(id)?.classList.remove('open'); }
document.addEventListener('click', e => {
  if (e.target.classList.contains('modal-overlay')) {
    e.target.classList.remove('open');
  }
});

// =============================================
// COURSE CARD RENDERER
// =============================================
function renderCourseCard(course, root = '') {
  const teacher = DB.getById('users', course.teacher_id);
  return `
  <div class="card course-card" onclick="window.location.href='${root}course-detail.html?id=${course.id}'">
    <div class="course-card-thumb">
      <img src="${course.thumbnail}" alt="${course.title}" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1501504905252-473c47e087f8?w=600&q=80'">
      <div class="overlay"></div>
      <div class="play-btn">▶</div>
    </div>
    <div class="course-card-body">
      <div style="display:flex;gap:8px;margin-bottom:10px;flex-wrap:wrap">
        <span class="badge badge-primary">${course.category}</span>
        ${levelBadge(course.level)}
      </div>
      <h4>${course.title}</h4>
      <div class="instructor">
        <span>👨‍🏫</span>
        <span>${teacher?.name || 'Instructor'}</span>
      </div>
      <div style="display:flex;align-items:center;gap:8px;font-size:0.8rem;color:var(--text-secondary)">
        <span>📖 ${DB.where('lectures', 'course_id', course.id).length} lectures</span>
        <span>•</span>
        <span>👥 ${course.students.toLocaleString()} students</span>
      </div>
    </div>
    <div class="course-card-footer">
      <div class="rating">
        ★ ${course.rating} <span>(${Math.floor(course.students * 0.4).toLocaleString()})</span>
      </div>
      <div class="price ${course.price === 0 ? 'free' : ''}">${formatPrice(course.price)}</div>
    </div>
  </div>`;
}

// =============================================
// ENROLLMENT HELPERS
// =============================================
function isEnrolled(courseId) {
  const session = Auth.getSession();
  if (!session) return false;
  return !!DB.getAll('enrollments').find(e => e.student_id === session.userId && e.course_id === courseId);
}

function enrollCourse(courseId) {
  const session = Auth.getSession();
  if (!session) { window.location.href = rootPath() + 'login.html'; return; }
  if (isEnrolled(courseId)) { showToast('Already enrolled!', 'info'); return; }
  const firstLecture = DB.where('lectures', 'course_id', courseId).sort((a, b) => a.order_index - b.order_index)[0];
  const enrollment = {
    id: generateId('e'),
    student_id: session.userId,
    course_id: courseId,
    progress: 0,
    enrolled_at: new Date().toISOString().split('T')[0],
    completed_lectures: [],
    last_lecture: firstLecture?.id || null
  };
  DB.insert('enrollments', enrollment);
  // Increment student count
  const course = DB.getById('courses', courseId);
  DB.update('courses', courseId, { students: (course.students || 0) + 1 });
  showToast('Successfully enrolled! 🎉', 'success');
  return enrollment;
}

// =============================================
// INIT
// =============================================

// Initialize DB immediately so it's ready for any inline script that runs
// before DOMContentLoaded (scripts at bottom of body execute before the event fires).
DB.init();

document.addEventListener('DOMContentLoaded', () => {
  // DB.init() is idempotent — safe to call again to handle any edge case.
  DB.init();
  initNavbarScroll();
  initScrollAnimations();
  initAccordions();
  initTabs();

  // Close mobile menu on link click
  document.querySelectorAll('.nav-links a').forEach(a => {
    a.addEventListener('click', () => {
      const nav = document.querySelector('.nav-links');
      if (window.innerWidth <= 768 && nav) nav.style.display = '';
    });
  });

  // Sidebar overlay for mobile
  document.addEventListener('click', e => {
    if (window.innerWidth <= 768) {
      const sidebar = document.getElementById('sidebar');
      const toggle = document.querySelector('.sidebar-toggle');
      if (sidebar && sidebar.classList.contains('open') && !sidebar.contains(e.target) && e.target !== toggle) {
        sidebar.classList.remove('open');
      }
    }
  });
});

// Make globally accessible
window.DB = DB;
window.Auth = Auth;
window.showToast = showToast;
window.enrollCourse = enrollCourse;
window.isEnrolled = isEnrolled;
window.renderCourseCard = renderCourseCard;
window.openModal = openModal;
window.closeModal = closeModal;
window.toggleSidebar = toggleSidebar;
window.toggleMobileMenu = toggleMobileMenu;
window.animateCounters = animateCounters;
window.generateId = generateId;
window.formatDate = formatDate;
window.timeAgo = timeAgo;
window.stars = stars;
window.levelBadge = levelBadge;
window.statusBadge = statusBadge;
window.avatarInitials = avatarInitials;
window.truncate = truncate;
window.formatPrice = formatPrice;
window.rootPath = rootPath;
window.renderPublicNav = renderPublicNav;
window.renderPublicFooter = renderPublicFooter;
window.renderSidebar = renderSidebar;
window.renderTopbar = renderTopbar;
