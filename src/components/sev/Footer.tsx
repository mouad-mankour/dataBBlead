import logo from "@/assets/logo.jpeg";

export function Footer() {
  return (
    <footer className="py-12 border-t border-border/30 relative">
      {/* Ligne de données subtile */}
      <div className="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-primary/20 to-transparent" />
      
      <div className="container mx-auto px-6">
        <div className="max-w-4xl mx-auto text-center space-y-6">
          {/* Logo et branding */}
          <div className="flex flex-col items-center space-y-4">
            <div className="flex items-center space-x-3">
              <img 
                src={logo} 
                alt="SEV Digital" 
                className="h-10 w-10 rounded-lg shadow-md"
              />
              <div>
                <h3 className="text-lg font-bold text-foreground">SEV Digital</h3>
                <p className="text-sm text-muted-foreground">Data Intelligence</p>
              </div>
            </div>
          </div>

          {/* Message poétique */}
          <div>
            <p className="text-muted-foreground italic text-lg">
              "Chaque donnée raconte une histoire.
              <br />
              <span className="text-primary font-medium">databblead révèle celle de votre croissance</span> avec intelligence et précision."
            </p>
          </div>

          {/* Informations de contact */}
          <div className="flex flex-col md:flex-row justify-center items-center gap-6 text-sm text-muted-foreground">
            <a href="mailto:contact@databblead.com" className="hover:text-accent transition-colors font-medium">
              contact@databblead.com
            </a>
            
            <span className="hidden md:block w-1 h-1 bg-muted-foreground/50 rounded-full" />
            
            <a href="#" className="hover:text-accent transition-colors">
              Mentions légales
            </a>
          </div>

          {/* Signature créative */}
          <div className="pt-6 border-t border-border/20">
            <p className="text-sm text-muted-foreground">
              Fait avec <span className="text-accent">♡</span> par{" "}
              <span className="text-primary font-medium">Databblead</span>
            </p>
            <p className="text-xs text-muted-foreground/60 mt-2">© 2025 — databblead, l'intelligence qui transforme vos données en croissance</p>
          </div>
        </div>
      </div>
    </footer>
  );
}