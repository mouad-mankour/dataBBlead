import { Header } from "@/components/sev/Header";
import { HeroSection } from "@/components/sev/HeroSection";
import { SevMechanism } from "@/components/sev/SevMechanism";
import StrategicAdvantage from "@/components/sev/StrategicAdvantage";
import { MediaBuying } from "@/components/sev/MediaBuying";
import { Filmmaking } from "@/components/sev/Filmmaking";
import { DataAnalytics } from "@/components/sev/DataAnalytics";
import { ScrapingService } from "@/components/sev/ScrapingService";
import { EnrichmentService } from "@/components/sev/EnrichmentService";
import { VerificationService } from "@/components/sev/VerificationService";
import { BusinessStrategy } from "@/components/sev/BusinessStrategy";
import { UseCases } from "@/components/sev/UseCases";
import { ContactForm } from "@/components/sev/ContactForm";
import { Footer } from "@/components/sev/Footer";
import { JsonLd } from "@/components/seo/JsonLd";

const Index = () => {
  return (
    <div className="min-h-screen">
      <JsonLd />
      <HeroSection />
      <SevMechanism />
      <StrategicAdvantage />
      <MediaBuying />
      <Filmmaking />
      <DataAnalytics />
      <ScrapingService />
      <EnrichmentService />
      <VerificationService />
      <BusinessStrategy />
      <UseCases />
      <ContactForm />
      <Footer />
    </div>
  );
};

export default Index;
