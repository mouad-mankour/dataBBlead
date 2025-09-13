import { useState, useEffect } from "react";
import logo from "@/assets/logo.jpeg";

export function Header() {
  const [isScrolled, setIsScrolled] = useState(false);

  useEffect(() => {
    const handleScroll = () => {
      setIsScrolled(window.scrollY > 20);
    };

    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  return (
    <header 
      className={`fixed top-0 left-0 right-0 z-50 transition-all duration-300 ${
        isScrolled 
          ? 'bg-background/80 backdrop-blur-md border-b border-border/50 shadow-lg' 
          : 'bg-transparent'
      }`}
    >
      <div className="container mx-auto px-4 sm:px-6">
        <div className="flex items-center justify-between h-16 sm:h-20">
          {/* Logo */}
          <div className="flex items-center space-x-3">
            <img 
              src={logo} 
              alt="SEV Digital" 
              className="h-8 w-8 sm:h-10 sm:w-10 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300"
            />
            <div className="hidden sm:block">
              <h2 className="text-xl font-bold text-foreground">SEV Digital</h2>
              <p className="text-xs text-muted-foreground">Data Intelligence</p>
            </div>
          </div>

          {/* Navigation - Hidden on mobile, can be expanded later */}
          <nav className="hidden md:flex items-center space-x-8">
            <a 
              href="#services" 
              className="text-muted-foreground hover:text-primary transition-colors duration-300"
            >
              Services
            </a>
            <a 
              href="#solutions" 
              className="text-muted-foreground hover:text-primary transition-colors duration-300"
            >
              Solutions
            </a>
            <a 
              href="#contact" 
              className="text-muted-foreground hover:text-primary transition-colors duration-300"
            >
              Contact
            </a>
          </nav>

          {/* CTA Button */}
          <div className="hidden sm:block">
            <a 
              href="#contact"
              className="inline-flex items-center px-4 py-2 bg-primary text-primary-foreground rounded-lg hover:bg-primary/90 transition-colors duration-300 text-sm font-medium"
            >
              Démarrer
            </a>
          </div>

          {/* Mobile menu button - can be expanded later */}
          <button className="sm:hidden p-2 text-muted-foreground hover:text-primary transition-colors">
            <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>
    </header>
  );
}
