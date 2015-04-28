class Post < ActiveRecord::Base

    def self.benchmark(method_name, *args)
      @@post ||= Post.new
      r = nil
      timing = Benchmark.measure { r = @@post.send(method_name, *args) }
      p r
      p "Time: #{(timing.real).to_i}"
    end

    def filesize(*args)
      @filesize1 ||= Hash.new
      @filesize1[args] ||= calculate_filesize(*args)
    end

    def filesize_hash(*args)
      @filesize2 ||= Hash.new do |hash, key|
        hash[key] = calculate_filesize(*key)
      end
      @filesize2[args]
    end

    def memoized_filesize
      calculate_filesize
    end


    def self.memoize(name, *args)
      alias_method "_unmemoized_#{name}", name
      @_memoize ||= Hash.new
      @_memoize[name] ||= Hash.new do |hash, key|
        hash[key] = send("_unmemoized_#{name}")
      end

    end

    def calculate_filesize(num = 1)
      sleep 1
      484545284845 * num
    end

    #memoize :memoized_filesize
end
