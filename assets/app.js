const root = document.documentElement;
const savedTheme = localStorage.getItem('nexora-theme');
if (savedTheme) root.dataset.theme = savedTheme;
const themeButton = document.querySelector('[data-theme-toggle]');
if (themeButton) themeButton.addEventListener('click', () => {
  const next = root.dataset.theme === 'dark' ? 'light' : 'dark';
  root.dataset.theme = next;
  localStorage.setItem('nexora-theme', next);
});

function updateClock() {
  const now = new Date();
  const clock = document.querySelector('#live-clock');
  const date = document.querySelector('#live-date');
  if (clock) clock.textContent = now.toLocaleTimeString('tr-TR', { hour: '2-digit', minute: '2-digit' });
  if (date) date.textContent = now.toLocaleDateString('tr-TR', { weekday: 'long', day: 'numeric', month: 'long' });
}
updateClock();
setInterval(updateClock, 1000);

async function loadWeather() {
  const endpoint = 'https://api.open-meteo.com/v1/forecast?latitude=39.9334&longitude=32.8597&current=temperature_2m,relative_humidity_2m,wind_speed_10m,weather_code&timezone=Europe%2FIstanbul';
  try {
    const response = await fetch(endpoint);
    if (!response.ok) throw new Error('weather unavailable');
    const data = await response.json();
    const current = data.current;
    document.querySelector('#weather-temp').textContent = `${Math.round(current.temperature_2m)}°C`;
    document.querySelector('#weather-label').textContent = `Ankara · ${weatherText(current.weather_code)}`;
    document.querySelector('#weather-humidity').textContent = `Nem %${current.relative_humidity_2m}`;
    document.querySelector('#weather-wind').textContent = `Rüzgâr ${Math.round(current.wind_speed_10m)} km/s`;
  } catch {
    const label = document.querySelector('#weather-label');
    if (label) label.textContent = 'Veri bekleniyor…';
  }
}
function weatherText(code) {
  if (code === 0) return 'Açık gökyüzü';
  if ([1,2,3].includes(code)) return 'Parçalı bulutlu';
  if ([45,48].includes(code)) return 'Sisli';
  if ([51,53,55,56,57].includes(code)) return 'Çiseli';
  if ([61,63,65,66,67,80,81,82].includes(code)) return 'Yağmurlu';
  if ([71,73,75,77].includes(code)) return 'Karlı';
  return 'Değişken hava';
}
loadWeather();
setInterval(loadWeather, 900000);

const calcButton = document.querySelector('#calc-button');
if (calcButton) calcButton.addEventListener('click', () => {
  const a = Number(document.querySelector('#calc-a').value);
  const b = Number(document.querySelector('#calc-b').value);
  const op = document.querySelector('#calc-op').value;
  let result;
  if (Number.isNaN(a) || Number.isNaN(b)) result = 'İki sayı gir';
  else if (op === '+') result = a + b;
  else if (op === '-') result = a - b;
  else if (op === '*') result = a * b;
  else if (op === '/') result = b === 0 ? 'Sıfıra bölünemez' : a / b;
  else result = (a * b) / 100;
  document.querySelector('#calc-result').textContent = typeof result === 'number' ? Number(result.toFixed(4)).toLocaleString('tr-TR') : result;
});
