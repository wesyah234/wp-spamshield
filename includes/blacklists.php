<?php
if ( !function_exists( 'add_action' ) ) {
	if ( !headers_sent() ) { header('HTTP/1.1 403 Forbidden'); }
	die('ERROR: This plugin requires WordPress and will not function if called directly.');
	}

function spamshield_get_anchortxt_blacklist() {
	$blacklist_keyphrases = array( // 803
		"1 night stand", "1 nite stand", "2013", "2014", "2015", "3 way", "3 way link", "access", "accident", "account", "accountant", "accounting", "accutane", "acomplia", "action", "acupunture", "adipex", 
		"administration", "adult", "adult chat", "advertise", "advertising", "advice", "affiliate", "african", "air jordan", "alabama", "alarm system", "alaska", "allied", "alprostadil", "amature", "ambassador", 
		"ambien", "android", "annual", "anonymous", "anxiety", "application", "arcane", "arctic", "argent", "arizona", "arkansas", "asphalt", "attorney", "auction", "aumento", "avanafil", "avenue", "average", 
		"aviator", "baccarrat", "balance", "bamboo", "bandage", "bankruptcy", "baratos", "baseball", "basement", "basketball", "battery", "bed bug", "beginner", "behavior", "bespoke", "bestiality", "betting", 
		"biggest", "birthday", "bisexual", "blackjack", "blogging", "blogspot", "blow job", "bluetooth", "booster", "booty call", "boulder", "boutique", "bracelet", "brazilian", "bridal", "browse", "bucuresti", 
		"builder", "building", "bungalow", "business", "buy pill", "caffeine", "calculator", "california", "call girl", "cambogia", "cannabis", "capital", "car rental", "carisoprodol", "cash advance", "casinos", 
		"casual", "caterer", "celebrity", "cellulite", "celulit", "certify", "chat room", "chaturbate", "cheap", "cheat", "chicago", "children", "chiropractic", "chiropractor", "cialis", "cigarette", "classic", 
		"cleaning", "cleanse", "clearance", "click here", "click the", "click through", "clinic", "clinical", "clitoris", "clonazepam", "clothing", "clutch", "cockroach", "cockroaches", "college student", 
		"collision", "coming", "command", "comment poster", "comments", "commercial", "commission", "compact", "compagnie", "company", "compilation", "computer", "concrete", "condition", "conditioning", "configure", 
		"connecticut", "conservative", "consolidation", "constructeur", "construction", "consultant", "consulting", "content", "contracting", "contractor", "control", "convoy", "corporate", "cosmetic", "cougar", 
		"counseling", "country", "county", "coupon", "crack", "credit card", "credit report", "credits", "cuisine", "cum", "cum shot", "custom", "customer", "cyclen", "cyclobenzaprine", "dailymotion", "dapoxetine", 
		"dating", "deals", "definition", "dental", "dentist", "depression", "dermatologist", "desert", "design", "desnuda", "detroit", "deutschland", "development", "diagram", "diet pill", "diets", "difference", 
		"different", "dildo", "diminish", "discount", "discreet", "disfuncao", "dissertation", "divorce", "domain", "dosage", "download", "drawing", "dresses", "drug rehab", "dui lawyer", "durable", "duty free", 
		"dutyfree", "dysfunction", "e-learning", "e-site", "earn money", "edmonton", "educational", "ejaculate", "electrician", "electronic", "elixir", "emergency", "empire", "employment", "engagement", "engine", 
		"engrossar", "enhancement", "enlargement", "enterprise", "entertaining", "entertainment", "ephedra", "ephedrine", "equity", "equity loan", "erectile", "erection", "eretil", "erotic", "eroticism", 
		"erythromycin", "escort service", "escorts", "european", "evasion", "executive", "exercise", "exterminating", "extermination", "exterminator", "extract", "extreme", "eyeglasses", "fabric", "facebook", 
		"factory", "family", "famous", "fasix", "fat loss", "female", "feminine", "finance", "financial", "finishing", "fioricet", "flooring", "follower", "following", "football", "for sale", "foreclosure", 
		"forever", "forex", "forgetfulness", "formula", "fort worth", "forum", "free code", "freenet", "frontier", "frozen", "fuck", "fuckbuddy", "fuckin", "furniture", "galaxy", "gambling", "gambling online", 
		"gaming", "garcinia", "garcinia cambogia", "generation", "generator", "genesis", "get rid of", "glazing", "government", "gratis", "gratuit", "green coffee", "green tea", "guarantee", "gynecologist", 
		"gynecology", "hack wifi", "hackear", "hair loss", "hand bag", "hawaii", "health", "health care", "healthy", "hearthstone", "heating", "heavenly", "hentai", "herbalife", "herpes", "heterosexual", "hip hop", 
		"hitherto", "holdem", "holdem poker", "holdem software", "home design", "home equity", "home finance", "homeopathic", "homepage", "homosexual", "hormone", "hospital", "hosting", "hotel", "hotel deal", 
		"hotel e-site", "how to", "hydrocodone", "illinois", "implant", "impotence", "impotencia", "impotent", "incest", "india outsource", "indiana", "indianapolis", "infection", "infestation", "information", 
		"inhibitor", "injury", "injury lawyer", "injustice", "instagram", "installation", "installer", "instant", "instruct", "instrumental", "insurance", "insurance deal", "insurance quote", "international", 
		"internet", "interview", "italian", "jacket", "jacksonville", "jailbreak", "javascript", "jewelry", "johannesburg", "junction", "jungle", "kangaroo", "kentucky", "keratin", "ketone", "keyword", "klonopin", 
		"kroatien", "kroatien insel brac", "labia", "labial", "labiale", "laptop", "laptopuri", "las vegas", "leading", "legend", "leveling", "levelling", "levitra", "levtira", "libido", "library", "limited", 
		"link builder", "link building", "linked in", "livraison", "locksmith", "logo design", "los angeles", "lose fat", "lose weight", "losing", "lottery", "louisiana", "louisville", "lunette", "lyric", "machine", 
		"make money", "management", "manager", "marijuana", "massachusetts", "massage", "masturbate", "mature", "medical", "medication", "medium", "megapolis", "memphis", "meridia", "message", "michigan", "milf", 
		"minnesota", "mississippi", "missouri", "mistake", "mobilabonnement priser", "mobile", "modern", "modernity", "modulesoft", "money make", "monster", "montaigne", "montre", "mortal", "mortgage", "movie", 
		"moving", "murder", "muscle", "muscular", "naked", "nashville", "natural", "nebraska", "negotiation", "network", "nevada", "new hampshire", "new jersey", "new mexico", "new york", "nike air", "nike shoe", 
		"north carolina", "north dakota", "nude", "nudism", "numerology", "nursery", "ob-gyn", "obstetric", "obstetrician", "office", "oklahoma", "one night stand", "one nite stand", "online", "online gambling", 
		"online marketing", "opiate", "optimization", "option", "ordering", "organization", "orgasm", "ottawa", "outfit", "outlet", "outsource india", "oxymoron", "page rank", "particular", "password", "pavilion", 
		"paxil", "payday", "penetracion", "penetrate", "peniana", "peniano", "penile", "penis", "pennsylvania", "percocet", "perfectly", "periodontist", "personalization", "pest control", "petroleum", "phantom", 
		"pharmacy", "phentermine", "philadelphia", "photoshop", "php expert", "phpdug", "phytoceramide", "pills", "pinterest", "plague", "plan cul", "plan q", "plantar fasciitis", "plastic", "platinum", "play", 
		"plumbing", "poker", "poker chip", "policy", "politic", "political", "popular", "porn", "porn star", "porno", "pornographic", "pornography", "porntube", "portable", "power kite", "poze", "prelude", 
		"premature", "premium", "prepaid", "prescription", "press room", "previous", "priligy", "primary", "princess", "prisoner", "product", "production", "professional", "program", "programa", "programme", 
		"project", "promo code", "promotion", "propane", "propecia", "property", "prostitute", "protein", "proxy", "psychic", "purse", "pussy", "quartz", "quote", "racing", "ranking", "rapes", "raping", "rapist", 
		"reaction", "read the", "realistic", "reality", "realty", "recruiting", "redeem", "redsnow", "reduce", "reflection", "reflexion", "relate", "release", "religion", "removal", "remove", "rencontre", "renewal", 
		"renovating", "renovation", "rent a car", "rental", "repair", "reparatii", "repellent", "replica", "reputation", "restoration", "restore", "revatio", "reverse", "reviews", "rhinoplasty", "rhode island", 
		"rimonabant", "ring tone", "ripped", "rivotril", "roaches", "roofer", "roofing", "router", "safety", "san antonio", "san diego", "san francisco", "san jose", "search engine", "search marketing", "seattle", 
		"secondary", "secret", "security", "segment", "sem", "seminar", "seo", "septum", "series", "services", "sex", "sex drive", "sex tape", "sexcam", "sexe", "sexiness", "sexism", "sexologia", "sextant", 
		"sexual", "sexual performance", "sexual service", "sexuality", "sexy", "shades", "shampoo", "shemale", "shipping", "shoes", "shopping", "short-term loan", "sildenafil", "simply", "sister", "skater", 
		"skin care", "slot machine", "smoking", "sneaker", "soccer", "social", "social bookmark", "social media", "social poster", "social submitter", "software", "soma", "source", "south carolina", "south dakota", 
		"special", "spence diamond", "spinal", "spray tan", "starcraft", "staxyn", "stendra", "steroid", "streaming", "student loan", "submitter", "success", "suggestion", "sunglasses", "supplement", "support", 
		"surgeons", "surgery", "survey", "swatch", "sweating", "system", "tablet", "tactic", "tadalafil", "tanning", "tassel", "technology", "template", "tequila", "testosterone", "texas holdem", "therapy", 
		"three way", "three way link", "through", "title", "top e-site", "top site", "trackback", "tractor", "trading", "traffic", "training", "tramadol", "transportation", "travel", "treatment", "trim spa", 
		"troubleshoot", "troubleshooting", "turbo tax", "turnkey", "turquoise", "twitter", "tycoon", "ultimate", "ultram", "unblocked", "underneath", "underwear", "unique", "unisex", "united states", "university", 
		"unlimited", "unlock", "uptown", "utility", "vagina", "vaginal", "valium", "vancouver", "vardenafil", "vehicle", "ventilation", "veterinarian", "veterinary", "viagra", "video", "videography", "vigara", 
		"vigrx", "village", "vintage", "vioxx", "visit", "visit now", "volume", "voucher", "warfare", "watches", "wayfarer", "web host", "web hosting", "web page", "web site", "webmaster", "weight loss", 
		"weightless", "west virginia", "wholesale", "wicked", "wifi hack", "wifi hacker", "wisconsin", "wrestling", "writing service", "wyoming", "xanax", "xenical", "xxx", "youtube", "zimulti", "zithromax", 
		"zoekmachine optimalisatie", "zolus", 
		);
	return $blacklist_keyphrases;
	}
?>