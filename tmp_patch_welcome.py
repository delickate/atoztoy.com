from pathlib import Path

p = Path(r"c:\wamp64\www\PHP\laravel\atoztoys\resources\views\welcome.blade.php")
text = p.read_text(encoding="utf-8")

start = text.find('            <div class="product-tab1-slider slick-initialized')
end = text.find("    <!--== Start Category Area Wrapper ==-->")
if start < 0 or end < 0:
    raise SystemExit(f"trending markers not found start={start} end={end}")

trending = """            <div class="product-tab1-slider" data-aos="fade-up" data-aos-duration="1300">
              @forelse($trendingProducts as $product)
                <div class="slide-item">
                  @include('partials-frontend.product-card', ['product' => $product])
                </div>
              @empty
                <div class="slide-item">
                  <p class="text-center text-muted">No products yet.</p>
                </div>
              @endforelse
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Product Tab Area Wrapper ==-->

"""

text = text[:start] + trending + text[end:]

leftover_start = text.find('                                <div class="product-action">')
newsletter = text.find("    <!--== Start Newsletter Area ==-->")
if leftover_start < 0 or newsletter < 0:
    raise SystemExit(f"leftover markers not found leftover={leftover_start} newsletter={newsletter}")
if leftover_start > newsletter:
    raise SystemExit("leftover start after newsletter")
text = text[:leftover_start] + text[newsletter:]

p.write_text(text, encoding="utf-8")
print("ok", len(text.splitlines()), "lines")
