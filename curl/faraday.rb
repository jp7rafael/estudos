conn = Faraday.new(:url => 'https://sandbox.moip.com.br') do |faraday|
  faraday.request  :url_encoded             # form-encode POST params
  faraday.response :logger                  # log requests to STDOUT
  faraday.adapter  Faraday.default_adapter  # make requests with Net::HTTP
end

conn.basic_auth('J6WFCRIMXDRAA9PEH1GLRAF75JR6KQ7M', 'ABKENX0FPMRG99AD6B2LOIVYR2OZ4ZJJX0LA05PM')

response = conn.get '/assinaturas/v1/plans'